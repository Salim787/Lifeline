<!-- Ganesh document -->
<?php
  //Has to recieve value of city from user and then changes has to be made in this document and find.php
  require('connect.php');

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
  if (isset($_POST['hospital_name']) && isset($_POST['password'])&& isset($_POST['contact']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['reg_no'])){
        
    $email = htmlentities($_POST['email'] );
    $user_name = $email;
    $mobile = htmlentities($_POST['contact'] );
    $hospital = htmlentities($_POST['hospital_name'] );
    $city = "Mumbai";               // $city= htmlentities($_POST['city']);
    $password = htmlentities($_POST['password'] );
    $add = htmlentities($_POST['address'] );
    $reg_no = htmlentities($_POST['reg_no'] );
    if (!empty($email) && !empty($password) && !empty($user_name)&& !empty($mobile)&& !empty($hospital)&& !empty($city)&& !empty($add)){
        try{
          $loc = geocode($add);
           $address_found=1;
          }catch(Exception $e){
           $address_found=0;
        }
        if ( $address_found) {
          $query = "INSERT INTO `registration` (user_name, email, mobile, hospital, reg_no, city, password,address,latitude,longitude) VALUES ('$user_name', '$email', '$mobile', '$hospital', '$reg_no','$city', '$password', '$loc[2]','$loc[0]','$loc[1]')";
          $response = mysqli_query($connection, $query);        
          if($response){
            echo "User Created Successfully.";
            $results = mysqli_query($connection,"SELECT * FROM `registration` WHERE email='$email' AND Password='$password'");
            $field=mysqli_fetch_assoc( $results );

            /*Commented lines are for creating a table for each user which turns out to be a bad idea.
            $tablename = "`hospital`.`hospital_record_".$field['id']."`";
            $create="CREATE TABLE ".$tablename." ( `hr_id` INT NOT NULL , `hr_bloodtype` VARCHAR(10) NOT NULL , `hr_bloodunits` INT NOT NULL DEFAULT '0' , `hr_expiry` DATE NOT NULL , `h_id` INT NOT NULL , PRIMARY KEY (`hr_id`)) ENGINE = InnoDB";
            echo $results = mysqli_query($connection,$create);
            */
            $results = mysqli_query($connection,"INSERT INTO `hospital_database` (hd_bloodtype, hd_bloodunits,hd_expiry, h_id) VALUES ('A+', '0', '2017-12-31', '".$field['id']."')");
            $results = mysqli_query($connection,"INSERT INTO `hospital_database` (hd_bloodtype, hd_bloodunits,hd_expiry, h_id) VALUES ('A-', '0', '2017-12-31', '".$field['id']."')");
            $results = mysqli_query($connection,"INSERT INTO `hospital_database` (hd_bloodtype, hd_bloodunits,hd_expiry,  h_id) VALUES ('B+', '0', '2017-12-31',  '".$field['id']."')");
            $results = mysqli_query($connection,"INSERT INTO `hospital_database` (hd_bloodtype, hd_bloodunits,hd_expiry, h_id) VALUES ('B-', '0', '2017-12-31', '".$field['id']."')");
            $results = mysqli_query($connection,"INSERT INTO `hospital_database` (hd_bloodtype, hd_bloodunits,hd_expiry, h_id) VALUES ('AB+', '0', '2017-12-31', '".$field['id']."')");
            $results = mysqli_query($connection,"INSERT INTO `hospital_database` (hd_bloodtype, hd_bloodunits,hd_expiry, h_id) VALUES ('AB-', '0', '2017-12-31', '".$field['id']."')");
            $results = mysqli_query($connection,"INSERT INTO `hospital_database` (hd_bloodtype, hd_bloodunits,hd_expiry, h_id) VALUES ('O+', '0', '2017-12-31', '".$field['id']."')");
            $results = mysqli_query($connection,"INSERT INTO `hospital_database`(hd_bloodtype, hd_bloodunits,hd_expiry, h_id) VALUES ('O-', '0', '2017-12-31', '".$field['id']."')");
          }else{
            echo "User Registration Failed";
          }
        }else{
           echo "Search Failed! Invalid Address, try including city name.";
          }
    }else{
      echo "Please enter all details!";
    }
  }
?>



<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">

  <!--style.css-->
  <link rel="stylesheet" href="login.css">
  <!--jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Signup |</title>
</head>
  <body>
    <form action="register.php" method="POST">
     <section id="signup-container">
       <div class="row">
         <a class="close_form" href="#"><i class="material-icons">close</i></a>

         <div class="col s12">
         <h4 class="brand-logo">Lifeline</h4>
         </div>
         <div class="input-field col s12">
         <input name="hospital_name" id="hospital_name" type="text" class="validate">
         <label for="hospital_name">Hospital Name</label>
        </div>
        <div class="input-field col s12">
          <input name="reg_no" id="registration_number" type="text" class="validate">
          <label for="registration_number">Registration Number</label>
        </div>
        <div class="input-field col s12">
          <input name="email" id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input name="password" id="password" type="password" class="validate">
          <label for="password" >Password</label>
        </div>
         <div class="input-field col s4 ">
          <label for="city">City</label>
         <select name="city">       
            <option value="" disabled selected>Choose your city</option>              <!-- options for Mumbai and Pune only -->
           <option value="Mumbai">Mumbai</option>
            <option value="Pune">Pune</option>
           
         </select>
        </div>
        <div class="input-field col s4">
            <select>
              <option value="" disabled selected>Choose your state</option>
              <option value="Maharashtra">Maharashtra</option>
            </select>
            <label>State</label>
         </div>
        <div class="input-field col s4">
          <input id="zip" type="text"></textarea>
          <label for="zip">Zip</label>
        </div>
        <!-- To be fixed
        <div class="input-field col s12">
          
          <select class="icons"  name="city" id="city" multiple>
                       <option value="" disabled selected>City:</option>
                      <option value="Mumbai">Mumbai</option>
                      <option value="Pune">Pune</option>
                    </select> 
        </div>
      -->
        <div class="input-field col s12">
          <textarea name="address" id="address" class="materialize-textarea"></textarea>
          <label for="address">Address</label>
        </div>
        <div class="input-field col s12">
          <input name="contact" id="contact_number" type="tel" class="validate" maxlength="10">
          <label for="contact_number">Contact Number</label>
        </div>
          <div  class="col s12">
            <button type="submit" name="submit" id="register-btn"  class="waves-effect waves-light btn btn-large">Register</button>
        </div>
        <div class="col s12">
          <span class="agree-terms">Agree terms of service</span>
        </div>

      </form>




       </div>
     </section>

    <!--Materailze css script-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
      $('select').material_select();
      });
  </script>
  </body>
</html>
