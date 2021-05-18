<?php 
include_once 'dbcon.php';
 ?>
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
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>SETTING</title>
  <?php 

$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
    ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
    
	<style type="text/css">
		table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
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
      <div class="navbar navbar-dark bg-dark box-shadow">
      	  <a href="admin.php" class="btn btn-info" class="pull-left justify-content-start">HOME</a>
        <div class="container d-flex justify-content-end">
        	<?php 
          $sele="SELECT * FROM admin where username='$username'";
          $exee=mysqli_query($con,$sele);
          $row=mysqli_fetch_array($exee);
          echo '<img  style="vertical-align:middle" height="115" width="110" src="data:image/jpeg;base64,'.base64_encode( $row['profilepic'] ).'"/>';
          echo " ";
      ?>
<table style="width:100%">
  <tr>
    <th>First Name:</th>
    <td>Bill Gates</td>
  </tr>
  <tr>
    <th>Last Name:</th>
    <td>555 77 854</td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>555 77 855</td>
  </tr>
  <tr>
    <th>Email:</th>
    <td>555 77 855</td>
  </tr>
  
</table>
</body>
</html>