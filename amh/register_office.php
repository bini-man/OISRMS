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
	<title>office register</title>
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
    		margin: 110px;
    		background-color: ;
    		border: 3px solid black;
        border-radius: 20px;
    		padding: 13px;
    		color: black;
    		text-align: center;

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
            echo '<img style="border-radius: 50%;" style="vertical-align:middle" height="80" width="100" src="data:image/jpeg;base64,'.base64_encode( $row['profilepic'] ).'"/>';
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
     

    </header>

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

<h3>REGISTERATION FORM FOR OFFICE</h3>

<form method="post" action="#">
  <br>
  <br>
  <div class="row">
      <div class="col-md-2">
BLOCK NUMBER:

</div>
<br>

      <div class="col-md-4">
<input type="NUMBER" class="form-control" required="" name="block_number" placeholder="enter block number">
</div>
</div>
<br>
  <br>
  <div class="row">
      <div class="col-md-2">
OFFICE NUMBER:
<br>
  <br>
</div>
      <div class="col-md-4">
<input type="NUMBER" name="offic_number"required="" placeholder="enter office number" class="form-control">
<br>
<br>
</div>
</div>
<div class="row">
<div class="col-md-2">
OFFICE DESCRIPTION :
<br>
  <br>
</div>
      <div class="col-md-4">
<input type="text" name="offic_desc" required="" placeholder="enter office description" class="form-control">
<br>
<br>
</div>
</div>
<button name="register"  class="btn btn-success"  ><span class="glyphicon glyphicon-registration-mark"> REGISTER</span></button>
</div>
</form>
</div>
<?php 
if (isset($_POST['register'])) {
	$block_number=$_POST['block_number'];
	$offic_number=$_POST['offic_number'];
  $office_description=$_POST['offic_desc'];
	$sum=$block_number."-".$offic_number;
	
		$sql="INSERT INTO office(office_id,block_number,office_description,sum) VALUES ('$offic_number','$block_number','$office_description','$sum')";
	$exe=mysqli_query($con,$sql);
	if ($exe) {
		 header("location:register_office.php?Empty=SUCCESSFULY REGISTERD");
  
	}else{
     header("location:register_office.php?Invalid=ALREADY REGISTERD");
  
	}



	}


 ?>

 <?php 
include_once 'footer.php';
  ?>
</body>
</html>