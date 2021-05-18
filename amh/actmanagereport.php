<?php  
include_once 'dbcon.php';
$input=filter_input_array(INPUT_POST); 

$firstname=mysqli_real_escape_string($con,$input["firstname"]);
$lastname=mysqli_real_escape_string($con,$input["lastname"]);
$username=mysqli_real_escape_string($con,$input["username"]);
$fixed=mysqli_real_escape_string($con,$input["fixed"]);
$not_fixed=mysqli_real_escape_string($con,$input["not_fixed"]);
if ($input["action"] === 'edit') {
	$query="
	UPDATE expet_status 
	SET firstname='".$firstname."',
	lastname='".$lastname."',
	username='".$username."',
	fixed='".$fixed."',
	not_fixed='".$not_fixed."'
	WHERE id = '".$input["id"]."'
	";
	$bini=mysqli_query($con,$query);
	if (!$bini) {
		
	echo "<script>alert('NOT UPDATED PLEASE ENTER CORRECT VALUE');</script>";
	}

}
if ($input["action"] === 'delete') {
	$query="
	DELETE FROM expet_status
	WHERE id= '".$input["id"]."'
	";
mysqli_query($con,$query);
}
echo json_encode($input);
?>