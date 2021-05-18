<?php
session_start();
if(!isset($_SESSION['una']))
{
?>
 <script>
  alert('YOU ARE NOT ALLOWED TO ACCESS!!Please Login to access the page');
  window.location='login.php';
 </script>
<?php
}
 include_once("dbcon.php");
?>
<?php 
ob_start();
include_once 'dbcon.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>OFFICE HEAD register</title>
	<?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

	echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
		?>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet"  href="bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style >
    	#registration{
    		margin: 50px;
    		background-color: ;
    		border: 3px solid black;
    		border-radius: 20px;
    		padding: 13px;
    		color: black;
    		text-align: left;

    	}
h3{
	font-family: verdana;
}
input{
	font-family: algerian;
}
#time{
	text-align: right;
}
    </style>



</head>
<body>
	
 <?php 
          $username=$_SESSION['una'];
     ?>
   <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow navbar-fixed-top">
      	  <a href="admin.php" class="btn btn-info" class="pull-left justify-content-start">HOME</a>
        <div class="container d-flex justify-content-end">
        	<?php 
          $sele="SELECT * FROM admin where username='$username'";
          $exee=mysqli_query($con,$sele);
          $row=mysqli_fetch_array($exee);
         if (empty($row['profilepic'])) {
          
          }else{
            echo '<img  style="border-radius: 50%;" style="vertical-align:middle" height="80" width="100" src="data:image/jpeg;base64,'.base64_encode( $row['profilepic'] ).'"/>';
          }
         echo "&nbsp&nbsp&nbsp";
      ?>
          <a href="#" class="navbar-brand d-flex align-items-end">
           <strong class="pull-left"><?php echo $username ?></strong>
          </a>
          <div class="pull-right">
             <a href="logoutadmin.php" class="btn btn-danger my-2">LOGOUT</a>
          </div>
        </div>
      </div>
    </header>
    <?php 
if (empty($row['profilepic'])) {

       ?>
     <br>
     <br>
     <br>
     <br>
      <?php 
}else{
   ?>
    <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <?php 
}
 
       ?>
     
 <?php 
if (@$_GET['Empty']==true) {
  ?>
<div class="alert alert-success  "><strong>Success!</strong><?php echo $_GET['Empty'] ?></div>
  <?php 
}
?>
<?php 
if (@$_GET['Invalid']==true) {
  ?>
  <div class="alert alert-danger "><strong>ERROR!</strong><?php echo $_GET['Invalid'] ?></div>
  <?php 
 
}

 ?>
	<div id="registration" class="container justify-content-center">

<h2>Account Registration For OFFICE HEAD'S</h2>
<br>
<br>

<form method="post" action="#" enctype="multipart/form-data">
	<br>
  <br>
  <div class="row">
      <div class="col-md-6">
	FIRST NAME:
	
	<input type="text" name="firstname" required="" placeholder="please enter your first name" class="form-control">
	<br>
	<br>
</div>
<br>
  <br>
      <div class="col-md-6">
	LAST NAME:
	
	<input type="text" name="lastname" required="" placeholder="please enter your last name" class="form-control">
	<br>
	<br>
</div>
</div>
<br>
  <br>
  <div class="row">
      <div class="col-md-6">
	EMAIL:(optional)
	
	<input type="email" name="email"  id="email" placeholder="please enter your email" class="form-control">
	<span id="email_status"></span> 
	<br>
	<br>
</div>
<br>
  <br>
      <div class="col-md-6">
	 SEX:
	
	<select name="SEX" class="form-control" required="">
		<option value="">select your sex</option>
		<option value="male">MALE</option>
		<option value="female">FEMALE</option>
	</select>
	<br> 
	<br>
</div>
</div>
<br>
  <br>
  <div class="row">
      <div class="col-md-6">
	BLOCK NUMBER ID:  
	
<select name="block_number" id="block_number" required="" class="form-control">
	<option value="">select block</option>
	<?php 
$sql="SELECT DISTINCT block_number from office";
$exe=mysqli_query($con,$sql);



while ($row=mysqli_fetch_assoc($exe)) {
	echo '<option value="'.$row["block_number"].'">'.$row["block_number"].'</option>';
}
echo "</select>";
	 ?>
	<br>
	
	<br>
</div>
<br>
  <br>
      <div class="col-md-6">
	
	OFFICE ID: 

<select name="office_id" id="office_id" required="" class="form-control">
	<option value="">select block first</option>
</select>
	<span id="officeid_status"></span>

 

<br>
<br>
</div>
</div>	
<br>
  <br>
  <div class="row">
      <div class="col-md-6">

	USERNAME:
	
	<input  type="text" id="chk_uname" name="username" placeholder="enter your username" class="form-control">
	<span id="user"></span>  
	
	<br>
	<br>
</div>
<br>
      <div class="col-md-6">
	PASSWORD:
	
	<input type="PASSWORD"  name="password" required="" placeholder="*********" id="password" class="form-control">
	
	<br>
	<br>
</div>
</div>
<br>
  <br>
  <div class="row">
      <div class="col-md-6">
PASSWORD Strength:
	
	<progress value="0" max="100" id="strength" style="width: 230px" class="form-control"></progress>
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
      	</div>
      	 <div class="col-md-6">
	CONIFORM PASSWORD:
	
	<input type="PASSWORD" class="form-control" name="conpass" id="conpass" required="" placeholder="*********">
	<span id='message'></span>
	<br>
	<br>
	<script >
	$('#password, #conpass').on('keyup', function () {
  if ($('#password').val() == $('#conpass').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else {
  	$('#message').html('Not Matching').css('color', 'red');
  }
    
});
	</script>
</div>
</div>
<div class="row">
      <div class="col-md-6">
      	SECURITY QUESTION:
      	<select name="sec_question" id="sec_question" required="" class="form-control">
      		<option value="">SELECT SECURITY QUESTION</option>
      		<option value="YOUR FAVORIT FOOD">YOUR FAVORITE FOOD</option>
      		<option value="YOUR FAVORIT MOVIE TITLE ">YOUR FAVORIT MOVIE TITLE </option>
      		<option value="YOUR UNCLE NAME">YOUR UNCLE NAME</option>
      		<option value="YOUR CHILDHOOD NAME">YOUR CHILDHOOD NAME</option>
			<option value="YOUR NICK NAME">YOUR NICK NAME</option>
      		<option value="YOUR BIRTH DATE">YOUR BIRTH DATE</option>

      	</select>
      </div>
      <div class="col-md-6">
      	SECURITY ANSWER:
      	<input type="text" name="sec_answer" id="sec_answer" required="" class="form-control">
      </div>
  </div>
	<div class="row">
      <div class="col-md-6">
PROFILE PIC:(optional)
<a id="b" href="webcam.php" target="_blank"><span   class="glyphicon glyphicon-camera" style="font-size: 40px;"  title="IF YOU HAVENT PHOTO YOU CAN CAPTURE"></span></a><input type="file" name="myimage" accept="image/*" class="form-control">	
</div>
</div>
	<button name="register"  class="btn btn-success" style="justify-content: center;"  ><span class="glyphicon glyphicon-registration-mark"> REGISTER</span></button>

</form>
<?php
include_once 'dbcon.php'; 
if (isset($_POST['register'])) {
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$officeid=$_POST['office_id'];
	$blocknumber=$_POST['block_number'];
	$usernamee=$_POST['username'];
	$password=$_POST['password'];
	$confirmpassword=$_POST['conpass'];
	$sex=$_POST['SEX'];
	$security_question=$_POST['sec_question'];
	$security_answer=$_POST['sec_answer'];
	$sum=$blocknumber."-".$officeid;

$chek_email="SELECT DISTINCT email  FROM officehead WHERE email='$email' and email!=''";
$exe_chek_email=mysqli_query($con,$chek_email);
if (mysqli_num_rows($exe_chek_email)>0) {
	header("location:register_officehead.php?Invalid=ALREADY EXISTED EMAIL PLEASE ENTER NEW EMAIL");
}else{

	if(!isset($_FILES['myimage']) || $_FILES['myimage']['error'] == UPLOAD_ERR_NO_FILE) {
		if ($password == $confirmpassword) {
    	$in="SELECT * FROM officehead WHERE sum='$sum'";
    	$ss=mysqli_query($con,$in);

    		if(mysqli_num_rows($ss) > 0) {
    			header("location:register_officehead.php?Invalid=THERE IS  A HEAD OF DEPARTEMENT FOR THIS OFFICE PLEASE FULL FILL FORM CORRECTLY");
  }else{
      
      $sql="INSERT INTO officehead (firstname,lasename,email,sex,officeid,block_number,sum,username,password,security_question,security_answer) VALUES ('$firstname','$lastname','$email','$sex','$officeid','$blocknumber','$sum','$usernamee','$password','$security_question','$security_answer')";
	$exe=mysqli_query($con,$sql);
	if ($exe) {
		header("location:register_officehead.php?Empty=SUCCESFULLY REGISTERD");
	}else{
		header("location:register_officehead.php?Invalid=NOT REGISTERD");
	} 
}
    }else
    {
    	header("location:register_officehead.php?Invalid=THE PASSWORD YOU ENTERED IS DOESN'T MATCH");
    	
    }
	}else{
	$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
$fileinfo= pathinfo($_FILES['myimage']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');

    if (in_array($extension_upload, $extensions_allowed ))
    {
    	if ($password == $confirmpassword) {
    	$in="SELECT * FROM officehead WHERE sum='$sum'";
    	$ss=mysqli_query($con,$in);

    		if(mysqli_num_rows($ss) > 0) {

    header("location:register_officehead.php?Invalid=THERE IS  A HEAD OF DEPARTEMENT FOR THIS OFFICE PLEASE FULL FILL FORM CORRECTLY");
  }else{
      
      $sql="INSERT INTO officehead (firstname,lasename,email,sex,officeid,block_number,sum,username,password,security_question,security_answer,profilpic) VALUES ('$firstname','$lastname','$email','$sex','$officeid','$blocknumber','$sum','$usernamee','$password','$security_question','$security_answer','$imagetmp')";
	$exe=mysqli_query($con,$sql);
	if ($exe) {
		header("location:register_officehead.php?Empty=SUCCESFULLY REGISTERD");
	}else{
		header("location:register_officehead.php?Invalid=NOT REGISTERD");
	} 
}
    }else
    {
    	header("location:register_officehead.php?Invalid=THE PASSWORD YOU ENTERED IS DOESN'T MATCH");
    }
}else{
	header("location:register_officehead.php?Invalid=PLEASE UPLOAD ONLY IMAGE FORMATS ONLY");

}

	}
}
}
 ?>

</div>

 <?php 
include_once 'footer.php';
  ?>
</body>
</html>
<script >
	$(document).ready(function(){
		$('#secno').on('blur',function(){
			$secnumber = $('#secno').val();
		if ($secnumber === "") {
			$('#uname-status').html('please fill this area!');
		}else{
			$.ajax({
				type:'post',
				url:"checkof.php",
				data:{
					send_secnumber:$secnumber
				},
				dataType:"text",
				success:function(data)
				{
					if(data == "ok"){
						$('#uname-status').html("this security number is available").css({'color':'green'});
					}else{
						$('#uname-status').html("this security number is taken").css({'color':'red'});
					}
					
				}
			});
		}
		});

	});
	$(document).ready(function(){
		$('#email').on('blur',function(){
			$send_email = $('#email').val();
		if ($send_email === "") {
			$('#email_status').html('please fill this area!');
		}else{
			$.ajax({
				type:'post',
				url:"checkof.php",
				data:{
					send_email:$send_email
				},
				dataType:"text",
				success:function(data)
				{
					if(data == "ok"){
						$('#email_status').html("this email is available").css({'color':'green'});
					}else{
						$('#email_status').html("this email is taken").css({'color':'red'});
					}
					
				}
			});
		}
		});

	});
$(document).ready(function(){
			$('#block_number').on('change',function(){
					var blocknumber = $(this).val();
					
					$.ajax({
						url:"fetch_blocknumber.php",
						method:"POST",
						data:'blocknum='+blocknumber,
						
						success:function(html){
							$('#office_id').html(html);
						}
					});

			});

	});
$(document).ready(function(){
		$('#chk_uname').on('blur',function(){
			$user = $('#chk_uname').val();
		if ($user === "") {
			$('#user').html('please fill this area!');
		}else{
			$.ajax({
				type:'post',
				url:"check_create_account_officehead.php",
				data:{
					send_user:$user
				},
				dataType:"text",
				success:function(data)
				{
					if(data == "ok"){
						$('#user').html("Correct username").css({'color':'green'});
					}else{
						$('#user').html("this username is taken please insert another username").css({'color':'red'});
					}
					
				}
			});
		}
		});

	});
</script>