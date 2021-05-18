<?php 

include_once 'dbcon.php';

if(isset($_POST["send_email"])) {
  $send_email = $_POST['send_email'];
  if ($send_email == "") {
    echo "plese fill this area!";
  }else{
$query = "SELECT * FROM expert WHERE email= '$send_email'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "taken";
  }else{
      echo "ok";
  }
  }
  
}

if(isset($_POST["send_secnumber"])) {
	$secnumber = $_POST['send_secnumber'];
	if ($secnumber == "") {
		echo "plese fill this area!";
	}else{
$query = "SELECT * FROM expert WHERE securityno= '$secnumber'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "taken";
  }else{
      echo "ok";
  }
	}
}

if(isset($_POST["send_usernamee"])) {
  $send_username = $_POST['send_usernamee'];
  if ($send_username == "") {
    echo "plese fill this area!";
  }else{
$query = "SELECT * FROM login WHERE username= '$send_username'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "taken";
  }else{
      echo "ok";
  }
  }
  
}
 ?>