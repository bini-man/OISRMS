<?php
session_start();
if(!isset($_SESSION['unemploye']))
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
	<title>ችግሩን ይጠይቁ</title>
	<link rel="stylesheet"  href="bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet"  href="bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
    ?>
<style >
    #aboutuser{
      width: 100%;
      height: 85px;
      border: 4px solid black;
      border-radius: 20px;
      background-color: #3B5998;
    }
#main{
  float: right;
  margin: 0px;
  padding: 0px;

}
#username{
color: red;
padding: 30px;
}
#img{
  margin: 0;
  right: 0px;
  bottom: 0px;
  top: 0px;
  position: absolute;

}
#req{
border: 3px solid black;
border-radius: 20px;
margin-top: 25px;
margin-bottom: 10px;
}
#register{
margin-left: 280px;
}
    </style>
  </head>
  <body>
    <?php 
          $username=$_SESSION['unemploye'];
     ?>
   <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">

          <a href="employe.php" class="btn btn-info" class="pull-left justify-content-start">መነሻ</a>
        <div class="container d-flex justify-content-end">
          <?php 
          $sele="SELECT * FROM employe where username='$username'";
          $exee=mysqli_query($con,$sele);
          $row=mysqli_fetch_array($exee);
         if (empty($row['profilpic'])) {
           
          }else{
          echo '<img style="border-radius: 50%;" style="vertical-align:middle" height="80" width="100" src="data:image/jpeg;base64,'.base64_encode( $row['profilpic'] ).'"/>';
        }
         echo "&nbsp&nbsp&nbsp";
      ?>
          <a href="#" class="navbar-brand d-flex align-items-end">
           <strong class="pull-left"><?php echo $username ?></strong>
          </a>
          <div class="pull-right">
             <a href="logoutemploye.php" class="btn btn-danger my-2">ውጣ</a>
          </div>
        </div>
      </div>
    </header>

    <?php 
if (@$_GET['Empty']==true) {
  ?>
<div class="alert alert-danger  "><strong>ERROR!</strong><?php echo $_GET['Empty'] ?></div>
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
 <?php 
if (@$_GET['Emp']==true) {
  ?>
<div class="alert alert-success   "><strong>ጥሩ!</strong><?php echo $_GET['Emp'] ?></div>
  <?php 
}
?>
<?php 
if (@$_GET['Inv']==true) {
  ?>
  <div class="alert alert-success  "><strong>ጥሩ!</strong><?php echo $_GET['Inv'] ?></div>
  <?php 
 
}

 ?>
<div id="req" class="container justify-content-center">
	<h3>የችግሩን ቅጽ መጠየቅ </h3>
	<br>
	<br>
<form method="post" action="#" enctype="multipart/form-data">
የችግሩን ቀን የተከሰተበት ቀን
  <br>
  <br>
  <div class="row">
      <div class="col-md-4">
		<input type="DATE" name="date" required="" class="form-control"  max="<?php echo date("Y-m-d"); ?>">
		<br>
	<br>
</div>
የእርስዎን ችግር
  <br>
  <br>
      <div class="col-md-4">
		<textarea cols="40" rows="5" name="problem" required="" class="form-control" placeholder="ከተጠቀሰው ችግር ጋር በተያያዘ እባክዎን ይመዝገቡ "></textarea>
		</div>
  </div>
    <br>
	<br>
	ቅድሚያ ተተግብሯል:
  <br>
  <br>
  <div class="row">
      <div class="col-md-4">
		<select name="appeared" id="appeared" required="" class="form-control">
      <option value="">በግልፅ ታይቷል</option>
			<option value="yes">አዎ</option>
			<option value="no">አይ</option>
		</select>
		<br>
	<br>
</div>
	የተዛመደ ፎቶ:
  <br>
  <br>
 
      <div class="col-md-4">
		<input type="file" class="form-control" name="file" id="file"  accept="image/*">
<br>
	<br>
	</div>
</div>
	<button name="register"  class="btn btn-success" id="register" ><span class="glyphicon glyphicon-send"> ችግር ይላኩ</span></button>
</form>

</div>
<?php 
if (isset($_POST['register'])) {
	$sqll="SELECT * FROM employe where username='$username'";
	$ee=mysqli_query($con,$sqll);
	$ree=mysqli_fetch_array($ee);
	$date=$_POST['date'];
	$problem=$_POST['problem'];
	$appeared=$_POST['appeared'];
	$office_id=$ree['office_id'];
	$block_id=$ree['block_number'];
	$fname=$ree['firstname'];
	$lname=$ree['lasename'];
	$byuser=$ree['username'];
  if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {

 $sql="INSERT INTO pendingrequest (office_id,block_id,fname,lname,previousappread,problem,dateofhappened,byuser) VALUES ('$office_id','$block_id','$fname','$lname','$appeared','$problem','$date','$byuser')";
  $exeY=mysqli_query($con,$sql);
  if ($exeY) {
  header("location:requestproblem.php?Inv=ችግሩ ግን ወደ ቢሮ ተልኳል በጽ / ቤቱ ኃላፊ በኩል ፡፡");
  }else{
    header("location:requestproblem.php?Invalid=አልተላከምም አልተሰጠምዎትም ሙሉ ሞልተው እንዲሞሉ ያድርጉ ፡፡");
  } 


  } else {
    $imagetmp=addslashes (file_get_contents($_FILES['file']['tmp_name']));
  $fileinfo= pathinfo($_FILES['file']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_allowed ))
    {
      $sql="INSERT INTO pendingrequest (office_id,block_id,fname,lname,previousappread,problem,dateofhappened,relatedfile,byuser) VALUES ('$office_id','$block_id','$fname','$lname','$appeared','$problem','$date','$imagetmp','$byuser')";
  $exeY=mysqli_query($con,$sql);
  if ($exeY) {
    
  header("location:requestproblem.php?Inv=ችግሩ ግን ወደ ቢሮ ተልኳል በጽ / ቤቱ ኃላፊ በኩል ፡፡");
  }else{
      header("location:requestproblem.php?Invalid=አልተላከምም አልተሰጠምዎትም ሙሉ ሞልተው እንዲሞሉ ያድርጉ ፡፡");
  } 
    }else
    {
        header("location:requestproblem.php?Invalid=እባክዎን የምስል ቅርጾችን ብቻ ያቅርቡ ፡፡");
    }
}
	

	}
	 ?>


</body>
<?php 

include_once 'footer.php' ?>
</html>