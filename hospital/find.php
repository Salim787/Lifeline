<?php
// List of near by hospitals is saved in $hospital_list variable and the number of hospitals in the list can be manipulated by changing values of $count near line 120
 require_once('connect.php');
 //function for obtaining latitude and longitude
 function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}

// Class for priority queue
 class PQtest extends SplPriorityQueue
{
    public function compare($priority1, $priority2)
    {
        if ($priority1 === $priority2) return 0;
        return $priority1 < $priority2 ? 1 : -1;
    }
}

$objPQ = new PQtest();
/*For testing:
$objPQ->insert('A',3);
$objPQ->insert('B',6);
$objPQ->insert('C',1);
$objPQ->insert('D',2);

//print_r($objPQ->extract() );

echo "COUNT->".$objPQ->count()."<BR>";

//mode of extraction
$objPQ->setExtractFlags(PQtest::EXTR_BOTH);

//Go to TOP
$objPQ->top();

while($objPQ->valid()){
    print_r($objPQ->current());
    echo "<BR>";
    $objPQ->next();
} 

*/

 if (!isset($_COOKIE['hospitalid']))
	{ // If cookie is not set redirect to login page
		header("Location: login.php");
	}
  else{

    $hid= $_COOKIE['hospitalid']; // Extracting value of hospital id from set cookie
     $result = mysqli_query($connection, "SELECT id,hospital,address,latitude,longitude FROM registration where id='$hid' ");
     $user= mysqli_fetch_assoc($result);

  }
  $display =0; // For displaying tables
if(isset($_POST['blood_type']) && isset($_POST['address'])  && isset($_POST['city'])){

 
  $address= htmlentities($_POST['address'] );
 	$blood_type=  htmlentities($_POST['blood_type']);
  $city=  htmlentities($_POST['city'] );
  if(!empty($address)&& !empty($blood_type)&& !empty($city)){
 	  $query = "SELECT id,hospital,address,latitude,longitude FROM registration where registration.city ='$city' and registration.id!='$hid' and registration.id in   (SELECT hospital_database.h_id FROM hospital_database where hd_bloodtype='$blood_type' and hd_bloodunits>0  )";

    try{
      $loc= geocode($address);

      $address_found=1;
    }catch(Exception $e){
      $address_found=0;
    }

    if($address_found){ 
 	    $result = mysqli_query($connection, $query);
      if($result ){
        $display=1; // For displaying tables

  	     while($data= mysqli_fetch_assoc($result)){

           $objPQ->insert($data , sqrt( pow($data['latitude']- $loc[0], 2)  +  pow($data['longitude']- $loc[1], 2) ) );
 	        }	

        $hospital_list = array(); 
        $count=3;           
       
        while($count>0){     
          array_push( $hospital_list, $objPQ->extract());
          $count--;
        }
 	    }else{
 		     echo "Search Failed! No Data Found.";
 	    }
    }else{
      echo "Search Failed! Invalid Address, try including city name.";
    }
  }
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Hospital Record</title>
  <style>
    table{
      border: 1px solid black;
    }
    table th{
      border: 1px solid black;
    }
    table td{
      border: 1px solid black;
    }
    </style>
</head>
<body>
  <form method="POST">
  <label for="address">Address:</label>
  <textarea name="address" rows=5 cols=25 > <?php print_r($user['address']); ?> </textarea><br><br>
   <label for="city">Required blood group:</label> 
  <select name="city" id="city" >
                      <option value="Mumbai">Mumbai</option>
                      <option value="Pune">Pune</option>
  </select> 
   <br><br>
  <label for="expiry">Required blood group:</label>          
  <select   name="blood_type" id="btype" >
    
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                       <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
   </select> 
   <br><br>
   <input type="submit" value="Search">
   <br><h4>Click here to return <a href="index.php">home</a><br>
    </form>
    <h2>Nearby Hospitals where required blood group is available:</h2>
    <table >
       <?php
       if(isset($_POST['blood_type']) && isset($_POST['address'])&& $display && count($hospital_list)>0){
      echo "<tr>
              <th >Hospital Name</th>
              <th >Address</th>
            </tr>";
     
        
        foreach ($hospital_list as $row) {
          $key = $row['id'];
          $url= "display.php?key=".$key;
          echo '<tr>',
              '<td><a href="'.$url.'">', $row['hospital'] ,'</a></td>',
              '<td>' , $row['address'] , '</td>',
            '</tr>';
        }
      }
        else
          echo "Error occurred please try again!";
      ?>
    </table> 

</body>
</html>