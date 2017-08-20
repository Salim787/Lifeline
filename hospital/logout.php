<?php
 require_once('connect.php');

if (isset($_COOKIE['hospitalid'])){
   setcookie('hospitalid', $user['id'], time() - (86400 * 30), "/");
}
header("Location: login.php");
?>
