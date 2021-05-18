<?php 
include_once 'dbcon.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>አግኙን</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="stylesheet"  href="bootstrap.min.css">
	<?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

	echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
		?>
		<style type="text/css">
			
			#bb{
				border: 3px solid black;
				border-radius: 20px;
				margin: 50px;
				padding: 35px;
				font-weight: bold;
		</style>
</head>
<body>
<?php 
include_once 'header.php';
include_once 'header2.php';
?>

<div  id="bb">
	<div >
		<?php 
			echo "<h3>ወደ የከተማ ልማት እና የግንባታ ሚኒስቴር እንኳን በደህና መጡ ፡፡</h3>";
			echo "<br>";
echo "<p>የከተማ ልማት እና የግንባታ ሚኒስቴር</p>";
			
echo "<p> 1233</p>";

echo "<p>አድስ አበበ ,ኢትዮጵያ</p>";

echo "<p>ስልክ:  +251-0116814693</p>";

echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+251-0116814694</p>";

echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+251-0116814692</p>";

echo "<p>ኢሜይል:mudc@gmail.com</p>";

echo "<p>ድህረገፅ:http//www.mudc.gov.et</p>";

		 ?>


	</div>

</div>
<?php
include_once 'footer.php';
 ?>
</body>
</html>