<?php 
include_once 'dbcon.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ስለ እኛ</title>
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

<div  id="bb" class="container">
	<div class="row">
		<div class="col-md-6">
		<?php 
			echo "<h3>ሃራማያ ዩኒቨርስቲ</h3>";
			echo "<br>";
echo "<p>  የከተማ ልማት እና የግንባታ ሚኒስቴር </p>";
			
echo "<p>የመስመር ላይ የአይቲ ድጋፍ መጠየቂያ ስርዓት</p>";

echo "<p>ገንቢ @Benja_man</p>";

echo "<p>ስልክ:  +251-931082139</p>";

echo "<p>ኢሜይል:biniyambadege4@gmail.com</p>";

		 ?>

</div>
<div class="col-md-6">
	
<!-- <img src="bini.jpg" width='400' height='260'>
 -->
</div>
	</div>

</div>
<?php
include_once 'footer.php';
 ?>
</body>
</html>