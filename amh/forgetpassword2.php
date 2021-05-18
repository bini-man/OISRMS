<?php 
session_start();
include 'dbcon.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>የይለፍ ቃል ረሳ </title>
	<?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

	echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
		?>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet"  href="bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style >
    	#box{
  border: 3px solid black;
  border-radius: 20px;
  margin: 20px;
  padding: 20px;
 
}

    </style>
</head>
<body>
<?php 

$email=$_SESSION['email'];
$randomnum=$_SESSION['randno'];
$role=$_SESSION['role'];
// <html>
// <body>
// <h2>MINISTRY OF CONSTRUCTION AND URBAN DEVELOPMENT</h2>
// <br>
// <br>
// <h4 style='background-color: #e0e0e0;'>EMAIL:$email</h4>
// <p style='border: 2px dashed #FB4314; width: 100%;' >PLEASE ENTER THIS CONIFORMATION CODE TO THE TEXT BOX THAT HAVE BEEN THERE IN YOUR GUI AND AFETER THAT YOU CAN INSERT ANOTHER PASSWORD FOR RESTORATION PROCESS AND YOUR CONIFORMATION PASSWORD IS: $randomnum </p>
// </body>
// </html>
$to = $email;
$subject = "$randomnum የእርስዎ የይለፍ ቃል መግለጫ ኮድ።";
$txt = '
 <html> 
    <body style="background-color: #a1bcaf;">
        <h1>ከእኛ ጋር ስለተቀላቀሉ እናመሰግናለን!</h1> 
       
<h3 style="border: 5px solid #FB23D4; width: 100%; height=50%"> የእኛን ድህረገፅ ስለተጠቀሙ እናመሰግናለን እና እባክዎን ወደ መተግባቢያ ኮዱ ይግቡ  በጭብጡ ክፍል ውስጥ ያለው እና አዲሱ የይለፍ ቃልዎን ያስገቡ እና እንደገና ያስገቡ እና የይለፍ ቃልዎን በራስ-ሰር ያስተካክላል   </h3>
<h3>ድረ ገጻችንን ስለጠቀምን እናመሰግናለን።</h3>
    </body> 
    </html>
';
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
$headers .= "Content-type:text/plain;charset=UTF-8"; 
 
// Additional headers 

if ( mail($to,$subject,$txt,$headers)) {
include 'header.php';
include 'header2.php';
?>
<div id="box" class="container justify-content-center">
	<div class="row">
		<div class="col-md-4">
	<form method="post" action="#">
		<br>
		<br>
	የግንኙነት ኮድ:
	<br>
	<br>
	<input type="NUMBER" required="" class="form-control" name="coniformation" id="coniformation"><span id="uname-status"></span>
<br>
	<br>
</div>
</div>
<div class="row">
		<div class="col-md-4">
	አዲስ የይለፍ ቃል:
	<br>
		<br>
	<input type="PASSWORD" class="form-control" name="password" required="" placeholder="*********" id="password">
	<br>
	<br>
	</div>
</div>
<div class="row">
		<div class="col-md-4">
	የይለፍ ቃል ጥንካሬ:
	<br>
		<br>
	<progress value="0" max="100" class="form-control" id="strength" style="width: 230px"></progress>
	</div>
</div>
<div class="row">
		<div class="col-md-4">
	<script type="text/javascript">
		var pass=document.getElementById("password")
		pass.addEventListener('keyup',function(){
			checkPassword(pass.value)
		})
		function checkPassword(password){
			var strengthbar = document.getElementById("strength")
			var strength=0;
			if(password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
					strength += 1
			}
			if(password.match(/[<>?]+/)){
				strength += 1
			}
			if(password.match(/[!@#$%^&*()]+/)){
				strength += 1
			}
			if(password.length > 5){
			      strength += 1
			  }
			  switch(strength){
			  	case 0:
			  		strengthbar.value = 20;
			  		break
			  		case 1:
			  		strengthbar.value = 40;
			  		break
			  		case 2:
			  		strengthbar.value = 60;
			  		break
			  		case 3:
			  		strengthbar.value = 80;
			  		break
			  		case 4: 
			  		strengthbar.value = 100;
			  		break
			  }
		}


	</script>
	<br>
	<br>
	</div>
</div>
<div class="row">
		<div class="col-md-4">
	እንደገና ያስገቡ:
	<br>
		<br>
	<input type="PASSWORD" name="conpass" id="conpass" required="" class="form-control" placeholder="*********">
	<span id='message'></span>
	<br>
	<br>
	<script >
	$('#password, #conpass').on('keyup', function () {
  if ($('#password').val() == $('#conpass').val()) {
    $('#message').html('መመሳሰል').css('color', 'green');
  } else {
  	$('#message').html('የማይዛመድ').css('color', 'red');
  }
    
});
	</script>
	</div>
</div>
<div class="row">
		<div class="col-md-4">
	<button name="register"  class="btn btn-success"   ><span class="glyphicon glyphicon-refresh"> ዳግም አስጀምር</span></button>
</div>
</div>
</form>
</div>
<?php 
if (isset($_POST['register'])) {
	$ra=$_POST['coniformation'];
	$password=$_POST['password'];
	$conformpass=$_POST['conpass'];
	if ($randomnum==$ra) {
		if ($password==$conformpass) {
	if ($role=="admin") {
		$insert="UPDATE admin SET password='$password' WHERE email='$email' ";
  	$exeinsert=mysqli_query($con,$insert);
  	if ($exeinsert) {
  		echo "<script>alert('በተሳካ ሁኔታ ተለውጦል።');</script>";
  		echo "<script>window.location='login.php';</script>";
  	}else{
  		echo "<script>alert('አልተቀየረም ትክክል ያልሆነ ነገር አለ።');</script>";
  		echo "<script>window.location='login.php';</script>";
  	}
	}
	if ($role=="expert") {
		$insert="UPDATE expert SET password='$password' WHERE email='$email' ";
  	$exeinsert=mysqli_query($con,$insert);
  	if ($exeinsert) {
  		echo "<script>alert('በተሳካ ሁኔታ ተለውጦል።');</script>";
  		echo "<script>window.location='login.php';</script>";
  		 
  	}else{
  		echo "<script>alert('አልተቀየረም ትክክል ያልሆነ ነገር አለ።');</script>";
  		echo "<script>window.location='login.php';</script>";
  	}
	}
	if ($role=="officehead") {
		$insert="UPDATE officehead SET password='$password' WHERE email='$email' ";
  	$exeinsert=mysqli_query($con,$insert);
  	if ($exeinsert) {
  		echo "<script>alert('በተሳካ ሁኔታ ተለውጦል።');</script>";
  		echo "<script>window.location='login.php';</script>";
  	}else{
  		echo "<script>alert('አልተቀየረም ትክክል ያልሆነ ነገር አለ።');</script>";
  		echo "<script>window.location='login.php';</script>";
  	}
	}
	if ($role=="employe") {
		$insert="UPDATE employe SET password='$password' WHERE email='$email' ";
  	$exeinsert=mysqli_query($con,$insert);
  	if ($exeinsert) {
  		echo "<script>alert('በተሳካ ሁኔታ ተለውጦል።');</script>";
  		echo "<script>window.location='login.php';</script>";
  	}else{
  		echo "<script>alert('አልተቀየረም ትክክል ያልሆነ ነገር አለ።');</script>";
  		echo "<script>window.location='login.php';</script>";
  	}
	}
	}else{
 echo "<script>alert('የገባው ይለፍ ቃል ከ ጋር እንደገና አይዛመድም።');</script>";
 echo "<script>window.location='login.php';</script>";
	}
}else{
 echo "<script>alert('የተሳሳተ ማረጋገጫ ኮድ ፡፡');</script>";
 echo "<script>window.location='login.php';</script>";
}
}


 ?>


<?php

include 'footer.php';
  } else{
  	echo "ይህ ኢሜይል አልተላከም እባክዎ እንደገና ይሞክሩ።";
  }
 ?>
</body>
</html>
<script >
$(document).ready(function(){
		$('#coniformation').on('blur',function(){
			$secnumber = $('#coniformation').val();
		if ($secnumber === "") {
			$('#uname-status').html('እባክዎን ይህንን ቦታ ይሙሉ ፡፡!');
		}else{
			$.ajax({
				type:'post',
				url:"forgetpassword3.php",
				data:{
					send_secnumber:$secnumber
				},
				dataType:"text",
				success:function(data)
				{
					if(data == "ok"){
						$('#uname-status').html("ያልተስተካከለ የግንኙነት ኮድ።").css({'color':'red'});
					}else {
						$('#uname-status').html("ትክክለኛ የመገጣጠሚያ ኮድ።").css({'color':'green'});
					}
					
				}
			});
		}
		});

	});
</script>