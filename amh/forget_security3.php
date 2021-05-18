<?php 
session_start();
include_once 'dbcon.php';
$username=$_SESSION['username'];
$role=$_SESSION['role'];

if(isset($_POST["send_ans_expert"])) {
	$answer_expert = $_POST['send_ans_expert'];
	if ($answer_expert == "") {
		echo "እባክዎን ይህንን ቦታ ይሙሉ!";
	}else{
$query = "SELECT security_answer FROM expert WHERE username= '$username'";
  $user_count = mysqli_query($con,$query);
  $row=mysqli_fetch_array($user_count);
  $real_answer=$row['security_answer'];

  if($answer_expert === $real_answer) {
      echo "ok";
  }else{
      echo "taken";
  }
	}
}

if(isset($_POST["send_ans_officehead"])) {
	$answer_officehead = $_POST['send_ans_officehead'];
	if ($answer_officehead == "") {
		echo "እባክዎን ይህንን ቦታ ይሙሉ!";
	}else{
$query = "SELECT security_answer FROM officehead WHERE username= '$username'";
  $user_count = mysqli_query($con,$query);
  $row=mysqli_fetch_array($user_count);
  $real_answer=$row['security_answer'];

  if($answer_officehead === $real_answer) {
      echo "oknw";
  }else{
      echo "taken";
  }
	}
}

if(isset($_POST["send_ans_employe"])) {
	$answer_employe = $_POST['send_ans_employe'];
	if ($answer_employe == "") {
		echo "እባክዎን ይህንን ቦታ ይሙሉ!";
	}else{
$query = "SELECT security_answer FROM employe WHERE username= '$username'";
  $user_count = mysqli_query($con,$query);
  $row=mysqli_fetch_array($user_count);
  $real_answer=$row['security_answer'];

  if($answer_employe === $real_answer) {
      echo "okaydl";
  }else{
      echo "taken";
  }
	}
}
 ?>