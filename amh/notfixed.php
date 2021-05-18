<?php 
session_start();
include_once 'dbcon.php';
$id=$_GET['id'];
    	$del="UPDATE  requests SET expert='' WHERE request_id='$id'";
    	$EE=mysqli_query($con,$del);
    	$username=$_SESSION['unexpert'];
    		$selct_fixed_request="SELECT * FROM expet_status WHERE username='$username'";
    		$exe_selct_fixed=mysqli_query($con,$selct_fixed_request);
    		$row=mysqli_fetch_array($exe_selct_fixed);
    		$fixed=$row['not_fixed'];
    		$increment=$fixed+1;
    		$fixed_incre="UPDATE expet_status SET not_fixed='$increment' WHERE username='$username'";
    		$exe_fixed_incre=mysqli_query($con,$fixed_incre);
    	if ($exe_fixed_incre) {
    		// echo "<script>alert('');</script>";
    		// echo '<script>window.location.href = "expert.php";</script>';
    	header("location:recivedrequest.php?Invalid=YOUR REQUSEST  REDIRECTED TO ADMIN TO SOLVE BY ANOTHER EXPERT");
    	}
 ?>
