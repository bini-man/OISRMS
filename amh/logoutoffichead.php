<?php
session_start();
include_once 'dbcon.php';
$username=$_SESSION['unofficehead'];
$role="admin";
$logintime=$_SESSION['loginidofficehead'];
$logout="UPDATE user_log SET logout=NOW() WHERE ID='$logintime'";
$exe=mysqli_query($con,$logout);
unset($_SESSION['unofficehead']);
header('Location:login.php');
?>