<?php
session_start();
$_SESSION = array();
session_destroy();
header("location: Login.php");
$_SESSION["ID"] = ""; 
exit;
?>
