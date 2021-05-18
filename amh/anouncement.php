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
			.pageination{
				display: inline-block;

			}
			.pageination a{
				float: left;
				padding: 8px 16px;
				text-decoration: none;
				border: 1px solid #ddd;
				color: black;
			}
			.pageination a.active{
				background-color: #4CAF50;
				border:1px solid #4CAF50;
				color: white;
			}
			.pageination a:hover:not(.active){
				background-color: #3B5998;
			}
			.pageination a:first-child{
				border-top-left-radius: 5px;
				border-bottom-left-radius: 5px;

			}
			.pageination a:last-child{
				border-top-right-radius: 5px;
				border-bottom-right-radius: 5px;
			}	
		</style>
</head>
<body>
	
	

<div  id="bb" class="container">
	<div class="row" >

		<div class="col-md-3">
			<h3 class="module-title"><center><u><h4 id="a"><span >መጪ ክስተት</h4></span></u></center></h3>
			<?php 
			$record_per_page = 2;
			$page = '';
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			}else{
				$page = 1;
			}
			$start_from = ($page-1)*$record_per_page;
				$display_announcement="SELECT * FROM announcement order by id desc LIMIT $start_from,$record_per_page";
			$exe_display_announcement=mysqli_query($con,$display_announcement);
			
			if (mysqli_num_rows($exe_display_announcement)>0) {
					while ($row=mysqli_fetch_array($exe_display_announcement)) {
						$date=$row['date'];
						$notice=$row['notice_amm'];
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
echo "ምንም መጪ ክስተት የለም።";
echo "</div>";
echo "</div>";
echo "</div>";
			}
			 ?>
		
		
	<?php 

$page_query="SELECT * FROM announcement order by id desc";
$exe_page=mysqli_query($con,$page_query);
$total_record=mysqli_num_rows($exe_page);
$total_page=ceil($total_record/$record_per_page);
echo "<br>";
echo '<div class="pageination">';
for ($i=1; $i<= $total_page ; $i++) { 
	echo '<a style="color:black;" href="index_am.php?page='.$i.'">'.$i.'</a>';
}
echo '</div>';
	 ?>				
		
</div>
</div>
</div>
</body>
</html>