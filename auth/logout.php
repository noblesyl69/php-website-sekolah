<?php 

session_start();
include_once "../config.php";

session_unset();
session_destroy();
$_SESSION = [];
header("location: login.php");
exit;

?>