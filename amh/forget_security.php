<?php 
ob_start();
session_start();
include_once 'dbcon.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>የይለፍ ቃል ረሳ ፡፡</title>
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
include 'header.php';
include 'header2.php';
   ?>

   <div id="box" class="container justify-content-center">
    <h3>የይለፍ ቃል ቅጽ </h3>
    <br>
    <br>
    <form method="post" action="#">
      ሥራዎን ይምረጡ:
      <br>
    <br>

    <div class="row">
      <div class="col-md-4">
    <select name="role" id="role" required="" class="form-control">
      <option value="">ሥራዎን ይምረጡ</option>
      <option value="expert">ባለሙያ</option>
      <option value="officehead">ቢሮ ኃላፊ</option>
      <option value="employe">ተቀጣሪ</option>
    </select> 
     </div>
     </div>
    <br>
    <br>
    እባክዎ የተጠቃሚ ስምዎን ያስገቡ :
    <br>
    <br>
    <div class="row">
      <div class="col-md-4">
    <input type="text" name="username" id="username" required="" placeholder="የተጠቃሚ ስምዎን ያስገቡ" class="form-control">
    </div>
     </div>
     <br>
    <br>
   <button name="recover"  class="btn btn-success"   ><span class="glyphicon glyphicon-edit" class="form-control"> አድስ</span></button>
     <br>
    <br>
    </form>

   </div>
   <?php 
if (isset($_POST['recover'])) {
 $username=$_POST['username'];
 $role=$_POST['role'];
 if ($role=="expert") {
$adminlogin="SELECT * from expert where username='$username' ";
    $exeadminlogin=mysqli_query($con,$adminlogin);
    if (mysqli_num_rows($exeadminlogin)>0 ){
       $_SESSION['username']=$username;
          $_SESSION['role']=$role;
          header('location:forget_security2.php');
           exit();
          ob_end_flush();
    }else{
      echo "<script>alert('ያልታወቀ የተጠቃሚ ስም እባክዎ ትክክለኛ የተጠቃሚ ስም ያስገቡ ፡፡');</script>";
       echo "
    <script>
  window.location='login.php';
 </script>
   ";
    }
}
if ($role=="officehead") {
$adminlogin="SELECT * from officehead where username='$username' ";
    $exeadminlogin=mysqli_query($con,$adminlogin);
    if (mysqli_num_rows($exeadminlogin)>0 ){
     $_SESSION['username']=$username;
          $_SESSION['role']=$role;
          header('location:forget_security2.php');
           exit();
          ob_end_flush();
    }else{
      echo "<script>alert('ያልታወቀ የተጠቃሚ ስም እባክዎ ትክክለኛ የተጠቃሚ ስም ያስገቡ ');</script>";
       echo "
    <script>
  window.location='login.php';
 </script>
   ";
    }
}
if ($role=="employe") {
$adminlogin="SELECT * from employe where username='$username' ";
    $exeadminlogin=mysqli_query($con,$adminlogin);
    if (mysqli_num_rows($exeadminlogin)>0 ){
    $_SESSION['username']=$username;
          $_SESSION['role']=$role;
          header('location:forget_security2.php');
           exit();
          ob_end_flush();
    }else{
      echo "<script>alert('ያልታወቀ የተጠቃሚ ስም እባክዎ ትክክለኛ የተጠቃሚ ስም ያስገቡ ፡፡');</script>";
       echo "
    <script>
  window.location='login.php';
 </script>
   ";
    }
}
}


     ?>
   <?php 

include 'footer.php';
    ?>
</body>
</html>