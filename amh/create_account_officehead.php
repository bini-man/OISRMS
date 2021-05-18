<?php 
include_once 'dbcon.php';
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>create account</title>
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
    	#registration{
    		margin: 40px;
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
 include_once 'header.php';
include_once 'header2.php';
	 ?>
	 <div id="time" class="col-md-10">
<font color="blue"> TIME:</font>
<font color="blue"></font>
<?php
$Today=date('y:m:d');
$new=date('l, F d, Y',strtotime($Today));

echo  $new; 
?>

</div>

</div>
	<div id="registration" class="container justify-content-center" >

<h2>Create Account Form FOR OFFICE HEAD'S</h2>
<br>
<br>

<form method="post" action="#" >
	<br>
	<br>
	<div class="row">
      <div class="col-md-6">
	SECURITY NUMBER:
	
	<input type="number" name="security" required="" id="secno"  placeholder="enter your security number"  class="form-control">
	<span id="uname-status"></span> 
	<span id="notfound_status"></span>
	<br>
	<br>

</div>
<br>
	<br>
	
      <div class="col-md-6">
	USERNAME:
	
	<input  type="text" id="chk_uname" name="username" placeholder="enter your username" class="form-control">
	<span id="user"></span>    

	<br>
	<br>
</div>
</div>
<br>
	<br>
	<div class="row">
      <div class="col-md-6">
	PASSWORD:
	
	<input type="PASSWORD"  name="password" required="" placeholder="*********" id="password" class="form-control">
	<br>
	<br>
	
</div>
<br>
	<br>
	
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
</div>
	<br>
	<br>
	<br>
	<br>
	<div class="row">
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
	<button name="register"  class="btn btn-success"   ><span class="glyphicon glyphicon-plus"> REGISTER</span></button>

</form>
</div>

<?php 
if (isset($_POST['register'])) {
	$securitynumber=$_POST['security'];
	$usernamee=$_POST['username'];
	$password=$_POST['password'];
	$confirmpassword=$_POST['conpass'];
if ($password == $confirmpassword) {
	
	$query = "SELECT * FROM officehead WHERE securityno= '$securitynumber'";
  $user_count = mysqli_query($con,$query);
  if(mysqli_num_rows($user_count) > 0) {
$chekfornull= "SELECT username FROM officehead WHERE securityno= '$securitynumber'";
  $execheckfornull = mysqli_query($con,$chekfornull);

  $row=mysqli_fetch_assoc($execheckfornull);
  $username=$row['username'];
if (empty($username)) {

	$insert="UPDATE officehead SET username='$usernamee' , password='$password' WHERE securityno='$securitynumber' ";
  	$exeinsert=mysqli_query($con,$insert);
  	if ($exeinsert) {
  		echo "<script>alert('successfuly registered');</script>";
  		 echo "
    <script>
  window.location='login.php';
 </script>
   ";
  	}else{
  		echo "<script>alert('not registered');</script>";
  		 echo "
    <script>
  window.location='create_account_officehead.php';
 </script>
   ";
  	}
}else{
	 echo "<script>alert('already registerd account please enter valid account number');</script>";
	 	 echo "
    <script>
  window.location='create_account_officehead.php';
 </script>
   ";
}

  }else{
     
     echo "<script>alert('please enter valid security number');</script>";
     	 echo "
    <script>
  window.location='create_account_officehead.php';
 </script>
   ";
  }
}else{
	echo "<script>alert('please enter same  password');</script>";
		 echo "
    <script>
  window.location='create_account_officehead.php';
 </script>
   ";
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
				url:"check_create_account_officehead.php",
				data:{
					send_secnumber:$secnumber
				},
				dataType:"text",
				success:function(data)
				{
					if(data == "ok"){
						$('#uname-status').html("already registered account").css({'color':'red'});
					}else {
						$('#uname-status').html("").css({'color':'red'});
					}
					
				}
			});
		}
		});

	});
$(document).ready(function(){
		$('#secno').on('blur',function(){
			$avilable = $('#secno').val();
		if ($avilable === "") {
			$('#notfound_status').html('please fill this area!');
		}else{
			$.ajax({
				type:'post',
				url:"check_create_account_officehead.php",
				data:{
					send_avnumber:$avilable
				},
				dataType:"text",
				success:function(daa)
				{
					if(daa == "unkown"){
						$('#notfound_status').html("unkown account please insert correct security number").css({'color':'red'});
					}else if(daa= "okkk"){
						$('#notfound_status').html("").css({'color':'red'});
					}
					
				}
			});
		}
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