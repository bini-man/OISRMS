<?php  
include_once 'dbcon.php';
$input=filter_input_array(INPUT_POST); 

$firstname=mysqli_real_escape_string($con,$input["firstname"]);
$lastname=mysqli_real_escape_string($con,$input["lasename"]);
$sex=mysqli_real_escape_string($con,$input["sex"]);
$email=mysqli_real_escape_string($con,$input["email"]);
if ($input["action"] === 'edit') {
	$query="
	UPDATE expert 
	SET firstname='".$firstname."',
	lasename='".$lastname."',
	sex='".$sex."',
	email='".$email."'
	WHERE username= '".$input["username"]."'
	";
	$bini=mysqli_query($con,$query);
	if (!$bini) {
		
	echo "<script>alert('NOT UPDATED PLEASE ENTER CORRECT VALUE');</script>";
	}

}
if ($input["action"] === 'delete') {
	$query="
	DELETE FROM expert
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