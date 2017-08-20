<?php
 require_once('connect.php');
  if (!isset($_COOKIE['hospitalid']))
	{ // If cookie is not set redirect to login page
		header("Location: login.php");
	}
   $hid=$_GET['key'];


?>

<html>
	<head><title>Data</title>
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
		<?php
			
			 $result=mysqli_query($connection, "SELECT hd_bloodtype,hd_bloodunits,hd_expiry FROM hospital_database where h_id='$hid' ");
			 if($result){
			echo "<table >
				<tr>
					<th >Blood Group</th>
					<th >Quantity</th>
					<th >Nearest Expiry</th>
				</tr>";
			
				
			 
				while($row=mysqli_fetch_assoc( $result )){
					echo '<tr>',
							'<td>', $row['hd_bloodtype'] ,'</td>',
							'<td>', $row['hd_bloodunits'] ,'</td>',
							'<td>' , $row['hd_expiry'] , '</td>',
						'</tr>';
				}
			}
			else{
				echo "No results please try again!";
			}
			?>
		</table>
</body>
</html>
