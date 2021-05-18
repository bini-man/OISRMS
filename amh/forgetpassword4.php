<?php   
include_once 'dbcon.php';
if(isset($_POST["blocknum"])&&isset($_POST["emailad"])) {
	$secnumber = $_POST['blocknum'];
	$emailadress=$_POST['emailad'];
	
		if ($secnumber=="admin") {
			$selectadmin="SELECT email FROM admin where email='$emailadress'";
			$exeselectadmin=mysqli_query($con,$selectadmin);
			if(mysqli_num_rows($exeselectadmin) > 0) {
      echo "taken";
  }else {
      echo "ok";
  }
		}
		if ($secnumber=="expert") {
			$selectexpert="SELECT email FROM expert where email='$emailadress'";
			$exeselectexpert=mysqli_query($con,$selectexpert);
			if(mysqli_num_rows($exeselectexpert) > 0) {
      echo "taken";
  }else {
      echo "ok";
  }
		}
		if ($secnumber=="officehead") {
			$selectofficehead="SELECT email FROM officehead where email='$emailadress'";
			$exeselectofficehead=mysqli_query($con,$selectofficehead);
			if(mysqli_num_rows($exeselectofficehead) > 0) {
      echo "taken";
  }else {
      echo "ok";
  }
		}
		if ($secnumber=="employe") {
			$selectemploye="SELECT email FROM employe where email='$emailadress'";
			$exeselectemploye=mysqli_query($con,$selectemploye);
			if(mysqli_num_rows($exeselectemploye) > 0) {
      echo "taken";
  }else {
      echo "ok";
  }
		}
  
	
}
?>