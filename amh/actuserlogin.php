<?php  
include_once 'dbcon.php';
$input=filter_input_array(INPUT_POST); 

$officenumber=mysqli_real_escape_string($con,$input[""]);

if ($input["action"] === 'delete') {
	$query="
	DELETE FROM user_log
	WHERE ID= '".$input["ID"]."' 
	";
mysqli_query($con,$query);
}
echo json_encode($input);
?>