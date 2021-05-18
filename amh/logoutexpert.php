<?php
session_start();
include_once 'dbcon.php';
$username=$_SESSION['una'];
$role="admin";
$logintime=$_SESSION['loginidexpert'];
$logout="UPDATE user_log SET logout=NOW() WHERE ID='$logintime'";
$exe=mysqli_query($con,$logout);
unset($_SESSION['unexpert']);
unset($_SESSION['login_details_id']);
header('Location:login.php');
?>