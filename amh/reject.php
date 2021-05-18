<?php 
include_once 'dbcon.php';
$id=$_GET['id'];
    	$del="DELETE FROM pendingrequest WHERE request_id='$id'";
    	$EE=mysqli_query($con,$del);
    	if ($EE) {
             header("location:approval.php?Invalid=ጥያቄዎ አልተፈቀደለትም");
  
    	
    	}
 ?>
