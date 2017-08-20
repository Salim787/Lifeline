<?php
 require_once('connect.php');
 if (!isset($_COOKIE['hospitalid']))
	{ // If cookie is not set redirect to login page
		header("Location: login.php");
	}
if(isset($_POST['blood_type']) && isset($_POST['expiry']) && isset($_POST['blood_uid']) ){
 
 	$hid= $_COOKIE['hospitalid']; // Extracting value of hospital id from set cookie
 	$blood_type = htmlentities($_POST['blood_type']);
 	$expiry= htmlentities($_POST['expiry'] );
 	$blood_uid= htmlentities($_POST['blood_uid'] );

 	if (!empty($blood_type) && !empty($expiry) && !empty($blood_uid)) {

 		$hospital_id = $hid;       // Using value hospital id from set cookie
 		$date_added= Date("Y-m-d",time());
 		$query = "INSERT INTO `hospital_record` (hr_uid,hr_bloodtype,hr_dateadded,hr_expiry, h_id) VALUES ('$blood_uid','$blood_type','$date_added','$expiry', '$hospital_id')";//Added hr_expiry in schema
 		$result = mysqli_query($connection, $query);
 		$expiry_result = mysqli_query($connection,"SELECT MIN(hr_expiry) expiry FROM `hospital_record` WHERE hr_bloodtype='$blood_type' and h_id='$hospital_id'");
 		$fetch= mysqli_fetch_assoc($expiry_result);
 		$expiry= $fetch['expiry'];
 		if($result){
 			echo "Data Updated Successfully!";
 			$result = mysqli_query($connection, "UPDATE `hospital_database` SET hd_bloodunits = hd_bloodunits+1, hd_expiry='$expiry' WHERE `hospital_database`.`h_id` = '$hid' AND `hospital_database`.`hd_bloodtype`='$blood_type'" );
 		}else{
 			echo "Data Not Updated";
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
 	<label for="scanimg">Upload image to scan barcode</label>
 	<input type="file" name="scanimg" id="scanimg" accept=".png, .jpg, .jpeg"><br />

 	<label for="blood_uid">Blood unit unique id:</label>					
 	<input type="text" name="blood_uid" id="blood_uid"><br/>

 	<label for="blood_type">Blood Type:</label>
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
 	<!--
	Changed hospital id to expiry date as hospital id is automatically retrieved through cookies
 -->
 	<label for="expiry">Expiry Date:</label>					
 	<input type="Date" name="expiry" id="expiry" value=<?php echo date("Y-m-d",strtotime("+ 6 weeks") ); ?>><br/>
 	<input type="submit" value="Confirm">
    </form>
    <br><h4>Click here to return <a href="index.php">home</a><br>
    <h2>Update History:</h2>
    <table >
			<tr>
				<th >Unique id</th>
				<th >Blood Group</th>
				<th >Date Added</th>
				<th >Expiry</th>
			</tr>
			<?php
			$hid= $_COOKIE['hospitalid'];
			 $result=mysqli_query($connection, "SELECT * FROM hospital_record where h_id='$hid' ORDER BY hr_dateadded DESC");
				// Loop for displaying each row
			 if($result){
				while($row=mysqli_fetch_assoc( $result )){
					echo '<tr>',
							'<td>', $row['hr_uid'] ,'</td>',
							'<td>', $row['hr_bloodtype'] ,'</td>',
							'<td>', $row['hr_dateadded'] ,'</td>',
							'<td>' , $row['hr_expiry'] , '</td>',
						'</tr>';
				}}
				else
					echo "Error occurred please try again!";
			?>
		</table>
</body>
</html>