<?php  
include_once 'dbcon.php';
$input=filter_input_array(INPUT_POST); 

$officenumber=mysqli_real_escape_string($con,$input["office_id"]);

if ($input["action"] === 'delete') {
	$query="
	DELETE FROM office
	WHERE id= '".$input["id"]."' 
	";
mysqli_query($con,$query);
}
echo json_encode($input);
?>