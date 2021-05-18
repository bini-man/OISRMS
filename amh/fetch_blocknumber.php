<?php 
include_once 'dbcon.php';
if (isset($_POST["blocknum"])) {
	$blockk=$_POST["blocknum"];
$sql="SELECT DISTINCT office_id from office where block_number ='$blockk'";

$exe=mysqli_query($con,$sql);
while ($row= mysqli_fetch_array($exe)) {
	echo '<option value="'.$row["office_id"].'">'.$row["office_id"].'</option>';
}
}

 ?>