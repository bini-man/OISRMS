<?php  
include_once 'dbcon.php';
$input=filter_input_array(INPUT_POST); 

$firstname=mysqli_real_escape_string($con,$input["firstname"]);
$lastname=mysqli_real_escape_string($con,$input["lasename"]);
$email=mysqli_real_escape_string($con,$input["email"]);
$password=mysqli_real_escape_string($con,$input["password"]);
if ($input["action"] === 'edit') {
	$query="
	UPDATE admin 
	SET firstname='".$firstname."',
	lasename='".$lastname."',
	email='".$email."'
	WHERE username = '".$input["username"]."'
	";
	$bini=mysqli_query($con,$query);
	if (!$bini) {
		
	echo "<script>alert('NOT UPDATED PLEASE ENTER CORRECT VALUE');</script>";
	}

}
if ($input["action"] === 'delete') {
	$query="
	DELETE FROM admin
	WHERE username= '".$input["username"]."'
	";
mysqli_query($con,$query);
}
echo json_encode($input);
?>