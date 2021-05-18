
<?php 
session_start();
if (isset($_SESSION['una'])) {
header('location:admin.php');
}elseif(isset($_SESSION['unexpert'])){
header('location:expert.php');
}elseif(isset($_SESSION['unemploye'])){
  header('location:employe.php');
}elseif(isset($_SESSION['unofficehead'])){
  header('location:offichead.php');
}else{

 ?>

<?php 
ob_start();
include_once 'dbcon.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ግባ</title>
  <link rel="stylesheet"  href="bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
    ?>
	<style type="text/css">
		
		body{
			background-color: #3B5998;
		}
		#login{
			margin: auto;
  width: 50%;
  border: 3px solid black;
  border-radius: 20px;
  padding: 8px;
  margin: 10%;
  margin-left: 26%; 
  margin-top: 30px;
  margin-bottom: 50px;
		}
		#lo{
			text-align: center;
			color: black;
			border: 3px solid black;
      border-radius: 20px;
			font-size: 40px;
		}
		#user{
	
		}
		#pass{
			float: : center;
		}
		#ll{
			margin-left:  130px;
			 background-color:rgba(0, 0, 0, 0);
    color:white;
		}
		#user {
    background-color:rgba(0, 0, 0, 0);
    color:black;
    border: none;
    outline:none;
    height:30px;
    transition:height 1s;
    -webkit-transition:height 1s;
}

	#pass {
    background-color:rgba(0, 0, 0, 0);
    color:black;
    border: none;
    outline:none;
    height:30px;
    transition:height 1s;
    -webkit-transition:height 1s;
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: black;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: black;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: black;
}
#loo{

  margin-left: 170px;
}
#rr{
background-color: white;
margin-left: 150px;
}
#forgetpasswor{
  color: black;
margin-left: 0px;
}
.dropbtn {
  background-color: white;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
 
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
 /* min-width: 160px;*/
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: red;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: black;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: black;}
	</style>



</head>
<body>
  <?php 
  include_once 'header.php';
  include_once 'header2.php';

   ?>
    <?php 
if (@$_GET['Empty']==true) {
  ?>
<div class="alert alert-danger  "><strong>ስህተት!</strong><?php echo $_GET['Empty'] ?></div>
  <?php 
}
?>
<?php 
if (@$_GET['Invalid']==true) {
  ?>
  <div class="alert alert-danger "><strong>ስህተት!</strong><?php echo $_GET['Invalid'] ?></div>
  <?php 
 
}

 ?>
	<div id="login"  >
<p id="lo">መአድመስ</p>
<br>
<br>
<div id="ll">
  <form method="post" action="#">
 <span class="glyphicon glyphicon-user" style="color:black"></span><input type="text" id="user" name="username" placeholder=" የተጠቃሚ ስም ያስገቡ" required="">
<br>
<br>
<span class="glyphicon glyphicon-lock" style="color:black"></span><input type="password" id="pass" name="password" placeholder=" ********" required="">
<br>
<br></div>
<select  name="role" id="rr">
	<option value="admin"> አስተዳዳሪ</option>
	<option value="expert">ባለሙያ</option>
	<option value="officehead">የቢሮ ኃላፊ </option>
	<option value="employee">ተቀጣሪ</option>
</select>
<br>
<br>
<button id="loo" name="login" class="btn btn-info"><span class="glyphicon glyphicon-log-in"> </span> ግባ </button>
<br>
<br>
<!-- <a href="forgetpassword.php" title="CLICK HERE IF YOU FORGET YOUR PASSWORD" id="forgetpasswor">?Forget Password</a> -->
<div class="dropdown">
  <button class="dropbtn">?የይለፍ ቃል ረሳ </button>
  <div class="dropdown-content">
    <a href="forgetpassword.php">ኢሜል በመጠቀም </a>
    <a href="forget_security.php">የደህንነት ጥያቄን በመጠቀም</a>
  </div>
</div>
</form>
</div>

<?php 
if (isset($_POST['login'])) {
  $role=$_POST['role'];
  $username=$_POST['username'];
  $password=$_POST['password'];
if ($role=="admin") {
   $adminlogin="SELECT * from admin where username='$username' and password='$password'";
    $exeadminlogin=mysqli_query($con,$adminlogin);
    if (mysqli_num_rows($exeadminlogin)>0 ){
      $user=$username;
      $rolee="admin";
     
      $INSERT="INSERT INTO user_log (username,role) VALUES ('$user','$rolee')";
      $es=mysqli_query($con,$INSERT);
$select_last_login="SELECT MAX(ID) AS maximum FROM user_log";
$exe_last_login=mysqli_query($con,$select_last_login);
$row=mysqli_fetch_array($exe_last_login);
$last_login_id=$row['maximum'];
$_SESSION['loginidadmin']=$last_login_id;
         $insert_login_time="UPDATE user_log SET logintime=NOW() WHERE ID='$last_login_id' ";
         $exe_login_time=mysqli_query($con,$insert_login_time);
          $_SESSION['una']=$username;
          header('location:admin.php');
          exit();
          ob_end_flush();
    }else{
     header("location:login.php?Invalid=እባኮን ትክክለኝ ስም እና የሚስጥር ቁልፍ ያስገብ");
    }
}
if ($role=="expert") {
  $expertlogin="SELECT * from expert where username='$username' and password='$password'";
    $exeexpertlogin=mysqli_query($con,$expertlogin);
    if (mysqli_num_rows($exeexpertlogin)>0 ){

      $usere=$username;
      $roe="expert";
        $INSERT="INSERT INTO user_log (username,role) VALUES ('$usere','$roe')";
      $es=mysqli_query($con,$INSERT);
$select_last_login="SELECT MAX(ID) AS maximum FROM user_log";
$exe_last_login=mysqli_query($con,$select_last_login);
$row=mysqli_fetch_array($exe_last_login);
$last_login_id=$row['maximum'];
$_SESSION['loginidexpert']=$last_login_id;
         $insert_login_time="UPDATE user_log SET logintime=NOW() WHERE ID='$last_login_id' ";
         $exe_login_time=mysqli_query($con,$insert_login_time);
      $_SESSION['unexpert']=$username;
       $sel="SELECT * FROM login where username='$username'";
  $exe_sel=mysqli_query($con,$sel);
  $row=mysqli_fetch_array($exe_sel);
  $_SESSION['user_id']=$row['user_id'];
    $_SESSION['username']=$row['username'];
    $sub_query="INSERT INTO login_details (user_id) VALUES ('".$row['user_id']."')";
    $exe_sub=mysqli_query($con,$sub_query);
  
    $_SESSION['login_details_id'] = mysqli_insert_id($con);
          header('location:expert.php');
          exit();
          ob_end_flush();
    }else{
header("location:login.php?Invalid=እባኮን ትክክለኝ ስም እና የሚስጥር ቁልፍ ያስገብ");
    }

}
if ($role=="officehead") {
 $officelogin="SELECT * from officehead where username='$username' and password='$password'";
    $exeofficelogin=mysqli_query($con,$officelogin);
    if (mysqli_num_rows($exeofficelogin)>0 ){
       $offuser=$username;
      $rr="officehead";
       $INSERT="INSERT INTO user_log (username,role) VALUES ('$offuser','$rr')";
      $es=mysqli_query($con,$INSERT);
$select_last_login="SELECT MAX(ID) AS maximum FROM user_log";
$exe_last_login=mysqli_query($con,$select_last_login);
$row=mysqli_fetch_array($exe_last_login);
$last_login_id=$row['maximum'];
$_SESSION['loginidofficehead']=$last_login_id;
         $insert_login_time="UPDATE user_log SET logintime=NOW() WHERE ID='$last_login_id' ";
         $exe_login_time=mysqli_query($con,$insert_login_time);
       $_SESSION['unofficehead']=$username;
          header('location:offichead.php');
          exit();
          ob_end_flush();
    }else{
    header("location:login.php?Invalid=እባኮን ትክክለኝ ስም እና የሚስጥር ቁልፍ ያስገብ");
    }

}
if ($role=="employee") {
   $employelogin="SELECT * from employe where username='$username' and password='$password'";
    $exeemployelogin=mysqli_query($con,$employelogin);
    if (mysqli_num_rows($exeemployelogin)>0 ){
            
 $uemp=$username;
      $emtt="employee";
        $INSERT="INSERT INTO user_log (username,role) VALUES ('$uemp','$emtt')";
      $es=mysqli_query($con,$INSERT);
$select_last_login="SELECT MAX(ID) AS maximum FROM user_log";
$exe_last_login=mysqli_query($con,$select_last_login);
$row=mysqli_fetch_array($exe_last_login);
$last_login_id=$row['maximum'];
$_SESSION['loginemploye']=$last_login_id;
         $insert_login_time="UPDATE user_log SET logintime=NOW() WHERE ID='$last_login_id' ";
         $exe_login_time=mysqli_query($con,$insert_login_time);
          $_SESSION['unemploye']=$username;

            $sel="SELECT * FROM login where username='$username'";
  $exe_sel=mysqli_query($con,$sel);
  $row=mysqli_fetch_array($exe_sel);
  $_SESSION['user_id']=$row['user_id'];
    $_SESSION['username']=$row['username'];
    $sub_query="INSERT INTO login_details (user_id) VALUES ('".$row['user_id']."')";
    $exe_sub=mysqli_query($con,$sub_query);
  //  $_SESSION['login_details_id'] = $connect->lastInsertId();
    $_SESSION['login_details_id'] = mysqli_insert_id($con);
          header('location:employe.php');
          exit();
          ob_end_flush();
    }else{
    header("location:login.php?Invalid=እባኮን ትክክለኝ ስም እና የሚስጥር ቁልፍ ያስገብ");
    }

}

}
 ?>


<?php 
}
include_once 'footer.php';
 ?>

</body>
</html>