<?php
session_start();
include_once 'dbcon.php';
$username=$_SESSION['una'];
$role="admin";
$logintime=$_SESSION['loginemploye'];
$logout="UPDATE user_log SET logout=NOW() WHERE ID='$logintime'";
$exe=mysqli_query($con,$logout);
unset($_SESSION['login_details_id']);
unset($_SESSION['unemploye']);
header('Location:login.php');
?>