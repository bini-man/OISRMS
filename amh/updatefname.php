<?php 
include_once 'dbcon.php';
 ?>
<!DOCTYPE html>
<html>
<head>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js2/jquery.hoverdir.js" language="javascript" type="text/javascript"></script>
	<link rel="stylesheet"  href="bootstrap.min.css">
		<style type="text/css">
			#noevent{
				border: 3px solid black;
				border-radius: 15px;
			}
			#notice{
				color: blue;

			}
		</style>
</head>
<body>
	
	

<div  id="bb" class="container">
	<div class="row" >

		<div class="col-md-3">
			<h3 class="module-title"><center><u><h4 id="a"><span >Upcoming Events</h4></span></u></center></h3>
			<?php 
// 			$display_announcement="SELECT * FROM announcement order by id desc";
// 			$exe_display_announcement=mysqli_query($con,$display_announcement);
// $number_of_result=mysqli_num_rows($exe_display_announcement);
// 			if (mysqli_num_rows($exe_display_announcement)>0) {
// 					while ($row=mysqli_fetch_array($exe_display_announcement)) {
// 						$date=$row['date'];
// 						$notice=$row['notice'];
// 						echo "<div id='notice'>";
// 						echo "<br/>";
// 					echo "<center style='color:black'><u><strong><h4 >$date</h4></strong></u></center></h3>";
// 					echo "<br/>";
// 					echo "$notice";
// 					echo "<br/>";
// 					echo "_______________________";
// 					echo "</div>";
// 					}
// 			}else{
// 				echo '<div   class="container">';
// 	echo '<div class="row" >';
// 				echo "<div id='noevent' class='col-md-3'>";
// echo "THERE IS NO NEW UPCOMING EVENTS";
// echo "</div>";
// echo "</div>";
			$display_announcement="SELECT * FROM announcement ";
		$exe_display_announcement=mysqli_query($con,$display_announcement);
$number_of_result=mysqli_num_rows($exe_display_announcement);
$result_per_page=2;
$number_of_pages=ceil($number_of_result/$result_per_page);

if (!isset($_GET['page'])) {
	$page=1;
}else{
	$page=$_GET['page'];
}
$this_page_first_result=($page-1)*$result_per_page;
$sql="SELECT * FROM announcement LIMIT ".$this_page_first_result.','.$result_per_page;
$result=mysqli_query($con,$sql);

if (mysqli_num_rows($result)>0) {
					while ($row=mysqli_fetch_array($result)) {
						$date=$row['date'];
						$notice=$row['notice'];
						echo "<div id='notice'>";
						echo "<br/>";
					echo "<center style='color:black'><u><strong><h4 >$date</h4></strong></u></center></h3>";
					echo "<br/>";
					echo "$notice";
					echo "<br/>";
					echo "_______________________";
				echo "</div>";
					}
			}else{
				echo '<div   class="container">';
	echo '<div class="row" >';
				echo "<div id='noevent' class='col-md-3'>";
echo "THERE IS NO NEW UPCOMING EVENTS";
echo "</div>";
echo "</div>";
}
for ($page=1; $page<=$number_of_pages ; $page++) { 
echo '<a style="color:black" href="index.php?page='.$page.'">'.$page.'</a>';
}

			
			 ?>
		
			
		
</div>
</div> 
</body>
</html>