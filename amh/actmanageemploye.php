<?php  
include_once 'dbcon.php';
$input=filter_input_array(INPUT_POST); 

$firstname=mysqli_real_escape_string($con,$input["firstname"]);
$lastname=mysqli_real_escape_string($con,$input["lasename"]);
$email=mysqli_real_escape_string($con,$input["email"]);
$sex=mysqli_real_escape_string($con,$input["sex"]);
$office_id=mysqli_real_escape_string($con,$input["office_id"]);
$blockJ_id=mysqli_real_escape_string($con,$input["block_number"]);
if ($input["action"] === 'edit') {
	$query="
	UPDATE employe 
	SET firstname='".$firstname."',
	lasename='".$lastname."',
	email='".$email."',
	sex='".$sex."',
	office_id='".$office_id."',
	block_number='".$blockJ_id."'
	WHERE  username= '".$input["username"]."'
	";
	$bini=mysqli_query($con,$query);
	if (!$bini) {
		
	echo "<script>alert('NOT UPDATED PLEASE ENTER CORRECT VALUE');</script>";
	}

}
if ($input["action"] === 'delete') {
	$query="
	DELETE FROM employe
	WHERE username= '".$input["username"]."'
	";
mysqli_query($con,$query);
$query2="
	DELETE FROM login
	WHERE username= '".$input["username"]."'
	";
mysqli_query($con,$query2);
}
echo json_encode($input);
?>