<?php 
include_once 'dbcon.php';
if(isset($_POST["send_uname"])) {
	$uname = $_POST['send_uname'];
	if ($uname == "") {
		echo "plese fill this area!";
	}else{
$query = "SELECT * FROM admin WHERE username= '$uname'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "taken";
  }else{
      echo "ok";
  }
	}
  
}
if(isset($_POST["send_email"])) {
	$email = $_POST['send_email'];
	if ($email == "") {
		echo "plese fill this area!";
	}else{
$query = "SELECT * FROM admin WHERE email= '$email'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "taken";
  }else{
      echo "ok";
  }
	}
  
}
?>