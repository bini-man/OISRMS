<?php 
include_once('dbcon.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>OISRS</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="stylesheet"  href="bootstrap.min.css">
</head>
	<?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

	echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
		?>
		<style type="text/css">
			#bini{
				background-color: #ffffff;
			}
		#text{
			text-align: center;
		}
			#toolbar{
					background-color:#4ffee6;
					border:0px solid white;
					font-size: 25px;
					font-family: algerian;
			}
			
				#aboutsys{
					border:3px solid white;
					margin-top:22px;
				}
				#more {display: none;}
				* {box-sizing: border-box}
		#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
    </style>
  </head>
  <body>
     <button onclick="topFunction()" id="myBtn" title="Go to top"><span class="glyphicon glyphicon-arrow-up"></span> </button>
  <script >
    window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
  </script>
	<?php 
include_once('header.php')
 ?>
 <div class="container">
	<div id="toolbar"  class="row justify-content-around" >
	<?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);
echo '<img class="col-md-2" style="vertical-align:middle" height="115" width="110" src="data:image/jpeg;base64,'.base64_encode( $result['rightimg'] ).'"/>';
echo '<p class="col-md-6" id="text" >';
echo $result['am'];
echo " የመስመር ላይ የአይቲ ድጋፍ መጠየቂያ ስርዓት";
echo '</p>';
echo '<img class="col-md-2"  style="vertical-align:middle"  height="115" width="110" src="data:image/jpeg;base64,'.base64_encode( $result['leftimg'] ).'"/>';

?>
</div>
</div>
<?php 
include_once('header2.php')
 ?>
    
<div class="row">
<div id="aboutsys" class="col-md-3">
	 <div id="includedContent">
	 	<?php 
include_once 'anouncement.php';
	 	 ?>
	 </div>
	</div>
<div id="slider" class="col-md-7" >
	<script >
		<?php 
		echo "
	var i=0;
	var images= [];
	var time = 1500;
";
$sql="SELECT * FROM slider";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);
// data:image/jpeg;base64,'.base64_encode( $result['firstimage'] ).'
 
echo "

	images[0] ='data:image/jpeg;base64,".base64_encode( $result['firstimage'] )."';
	images[1] ='data:image/jpeg;base64,".base64_encode( $result['secondimage'] )."';
	images[2] ='data:image/jpeg;base64,".base64_encode( $result['thirdimage'] )."';
	images[3] ='data:image/jpeg;base64,".base64_encode( $result['fourthimage'] )."';
    images[4]='data:image/jpeg;base64,".base64_encode( $result['fivithimage'] )."';
	function changeimg(){

		document.slide.src = images[i];

		if (i<images.length - 1) {
			i++;
		}else {
			i=0;
		}
		setTimeout('changeimg()',time);
	}

	window.onload=changeimg;
	
</script>
";
echo "<br>";
echo "<br>";
echo "<img name='slide' width='730' height='380' id='bini'>";

?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<div id="calnder" class="col-md-2">


<font color="blue"> ቀን:</font>
<font color="blue">
<?php
$Today=date('y:m:d');
$new=date('l, F d, Y',strtotime($Today));

echo  $new; 
?>
	
                            <td><a href="#" class="btn btn-primary dropdown-toggle"><font color="white"><i class="glyphicon glyphicon-calendar" ></i>&nbsp;&nbsp;የቀን መቁጠሪያ እይታ</font></a></td>
                        
						
                   
                 <script src="js2/calander.js" language="javascript" type="text/javascript"></script>
</font> 
</div>
</div>
<div id="footer">
	<?php include_once 'footer.php' ?>

</div>
</body>
</html>