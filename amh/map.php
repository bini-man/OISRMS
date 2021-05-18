<!DOCTYPE html>
<html>
<head>
	<title>SITE MAP</title>
	<?php 
	include_once 'dbcon.php';
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

	echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
		?>
	<style >
		
		#map{
			border:3px solid black;
			border-radius: 20px;
			margin: 20px;
			padding: 20px;
		}
	</style>
</head>
<body>
	<?php
	include_once 'header.php';
	include_once 'header2.php';
	?>
<div id="map">

<div id="googleMap" style="width:100%;height:400px;"></div>

<script>

function myMap() {
var mapProp= {
  center:new google.maps.LatLng(9.018726, 38.753891),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHxRSGKp0s3SmN1e4Jx7ABZ5OiEsmDzn4&callback=myMap"></script>
</div>
<?php
	include_once 'footer.php';
	?>
</body>
</html>