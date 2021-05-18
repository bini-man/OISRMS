<?php 
include_once 'dbcon.php';
if(isset($_POST["send_secnumber"])) {
	$secnumber = $_POST['send_secnumber'];
	if ($secnumber == "") {
		echo "plese fill this area!";
	}else{
$query = "SELECT * FROM officehead WHERE securityno= '$secnumber'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "taken";
  }else{
      echo "ok";
  }
	}
}

if(isset($_POST["send_email"])) {
  $send_email = $_POST['send_email'];
  if ($send_email == "") {
    echo "plese fill this area!";
  }else{
$query = "SELECT * FROM officehead WHERE email= '$send_email'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "taken";
  }else{
      echo "ok";
  }
  }
  
}


if(isset($_POST["send_off"])&&isset($_POST["send_bl"])) {
  $officeid = $_POST['send_off'];
  $bloknum=$_POST['send_bl'];
  if ($officeid == "") {
    echo "plese fill this area!";
  }else{
$query = "SELECT * FROM officehead WHERE officeid= '$officeid' and block_number= '$bloknum'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "taken";
  }else{
      echo "ok";
  }
  }
  
}
?>