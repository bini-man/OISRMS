<?php 

  
include_once 'dbcon.php';
if(isset($_POST["send_secnumber"])) {
	$secnumber = $_POST['send_secnumber'];
	if ($secnumber == "") {
		echo "plese fill this area!";
	}else{
$check="SELECT username FROM employe where securityno= '$secnumber'";
  $user_count = mysqli_query($con,$check);
  $row=mysqli_fetch_assoc($user_count);
  $usernamee=$row['username'];
  if( empty($usernamee) ) {
      echo "taken";
  }else {
      echo "ok";
  }
	}
}



if(isset($_POST["send_avnumber"])) {
	$avilable = $_POST['send_avnumber'];
	if ($avilable == "") {
		echo "plese fill this area!";
	}else{
$query = "SELECT * FROM employe WHERE securityno= '$avilable'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "okkk";
  }else{
      echo "unkown";
  }
	}
}


if(isset($_POST["send_user"])) {
	$user = $_POST['send_user'];
	if ($user == "") {
		echo "plese fill this area!";
	}else{
$query = "SELECT * FROM employe WHERE username= '$user'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
      echo "taken";
  }else{
      echo "ok";
  }
	}
}

 ?>