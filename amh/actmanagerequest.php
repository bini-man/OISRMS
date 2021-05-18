<?php  
include_once 'dbcon.php';
$input=filter_input_array(INPUT_POST); 

$officenumber=mysqli_real_escape_string($con,$input["request_id"]);

if ($input["action"] === 'delete') {
	$query="
	DELETE FROM requests
	WHERE request_id= '".$input["request_id"]."' 
	";
mysqli_query($con,$query);
}
echo json_encode($input);
?>