<?php  
include_once 'dbcon.php';
$input=filter_input_array(INPUT_POST); 

$firstname=mysqli_real_escape_string($con,$input["date"]);
$lastname=mysqli_real_escape_string($con,$input["notice"]);

if ($input["action"] === 'edit') {
	$query="
	UPDATE announcement 
	SET date='".$firstname."',
	notice='".$lastname."'
	WHERE id = '".$input["id"]."'
	";
	$bini=mysqli_query($con,$query);
	if (!$bini) {
		
	echo "<script>alert('NOT UPDATED PLEASE ENTER CORRECT VALUE');</script>";
	}

}
if ($input["action"] === 'delete') {
	$query="
	DELETE FROM announcement
	WHERE id= '".$input["id"]."'
	";
mysqli_query($con,$query);
}
echo json_encode($input);
?>