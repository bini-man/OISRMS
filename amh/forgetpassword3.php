<?php 
session_start();

$email=$_SESSION['email'];
$role=$_SESSION['role'];
$randomnum=$_SESSION['randno'];
  
include_once 'dbcon.php';
if(isset($_POST["send_secnumber"])) {
	$secnumber = $_POST['send_secnumber'];
	if ($secnumber == "") {
		echo "እባክዎን ይህንን ቦታ ይሙሉ ፡፡!";
	}else{
  if( $secnumber==$randomnum) {
      echo "taken";
  }else {
      echo "ok";
  }
	}
}
?>