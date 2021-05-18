<?php
session_start();
if(!isset($_SESSION['unofficehead']))
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
	<title>የቢሮ ኃላፊ</title>
  <link rel="stylesheet"  href="bootstrap.min.css">
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
    ?><style >
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
  height: 75px;

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
    </style>
  </head>
  <body>
    <?php 
          $username=$_SESSION['unofficehead'];
     ?>
   <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow navbar-fixed-top">
        <div class="container d-flex justify-content-end">
          <?php 
          $sele="SELECT * FROM officehead where username='$username'";
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
             <a href="logoutoffichead.php" class="btn btn-danger my-2">ውጣ</a>
          </div>
        </div>
      </div>
    </header>
    <?php 
if (empty($row['profilpic'])) {

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
    <div class="container">
<div id="fetures" class="row justify-content-around">
  <div class="col-md-4">
 <a href="faqofficehead.php" title="ብዙ ጊዜ የሚጠየቁ ጥያቄዎችን ለማየት።"><img src="faq_am.jpg"width="250" height="180" ></a>

</div>
<div class="col-md-4">
  <a href="self_off.php"  title="የራስን ደህንነት ለመቆጣጠር ጠቅ ያድርጉ ፡፡"><img src="self_am.jpg" width="250" height="180"></a> 
 </div>
</div>
   <br>
   <br>
   <div class="row justify-content-around">
  <div class="col-md-4">
   <a href="offrequest.php" title="ጥያቄን ለመላክ።"> <img src="main_am.jpg" width="250" height="180"></a>
  </div>

   <div class="col-md-4">
   <a href="officeheadsetting.php"> <img src="set_am.jpg" width="250" height="180"></a> 
     <br>
     <br>
   </div>
    </div >
    <div class="row justify-content-around">
    <div class="col-md-4">
    <a href="approval.php" title="ጥያቄዎችን ለማመልከት።"><img src="app_am.png" width="250" height="180"></a>
  </div>
  </div>
</div>
<?php 

include_once 'footer.php' 
?>
  </body>
  </html>