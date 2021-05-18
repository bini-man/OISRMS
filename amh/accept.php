<?php 
include_once 'dbcon.php';
$id=$_GET['id'];
$query="SELECT * FROM pendingrequest WHERE request_id='$id'";
$exe=mysqli_query($con,$query);
$row=mysqli_fetch_array($exe);
$office_id=$row['office_id'];
$block_id=$row['block_id'];
$fname=$row['fname'];
$lname=$row['lname'];
$relatedfile="data:image/jpeg;base64,".base64_encode( $row['relatedfile'] )."";
$previousappread=$row['previousappread'];
$problem=$row['problem'];
$date=$row['dateofhappened'];
$byuser=$row['byuser'];
$insert="INSERT INTO requests (blockid,officeid,fname,lname,previousappread,problem,Date,relatedfile,byuser) SELECT office_id,block_id,fname,lname,previousappread,problem,dateofhappened,relatedfile,byuser FROM pendingrequest WHERE request_id='$id'";
$exee=mysqli_query($con,$insert);
if ($exee) {
	
    	
    	$del="DELETE FROM pendingrequest WHERE request_id='$id'";
    	$EE=mysqli_query($con,$del);
      header("location:approval.php?Empty=ጥያቄዎ ተቀባይነት አግኝቷል ፡፡");
  
   
}else
{
  header("location:approval.php?Invalid=አልተመለከተም ፡፡");
  
}
 ?>
