<?php
session_start();
include_once 'dbcon.php';
$username=$_SESSION['una'];
$role="admin";
$logintime=$_SESSION['loginidadmin'];
$logout="UPDATE user_log SET logout=NOW() WHERE ID='$logintime'";
$exe=mysqli_query($con,$logout);
unset($_SESSION['una']);
header('Location:login.php');
?>