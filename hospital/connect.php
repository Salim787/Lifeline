<?php
$connection = mysqli_connect('localhost', 'root', '');
$db = new mysqli('localhost', 'root', '','hospital');
$result = $db->query("SELECT * FROM registration");
if(!$connection){
	die("Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'hospital');
if(!$select_db){
	die("Selection Failed" . mysqli_error($connection));
}
?>