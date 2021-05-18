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
	<title>የጥያቄ ማመልከቻ</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<link rel="stylesheet"  href="bootstrap.min.css">

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
        <a href="offichead.php" class="btn btn-info" class="pull-left justify-content-start">መነሻ</a>
        
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
    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <?php 
          $sele="SELECT * FROM officehead where username='$username'";
          $exe=mysqli_query($con,$sele);
          $row=mysqli_fetch_array($exe);
          $officeid=$row['officeid'];
          $blockid=$row['block_number'];
                $sqll="SELECT * FROM pendingrequest where office_id='$officeid' and block_id='$blockid' ";
                  $exes=mysqli_query($con,$sqll);
        if (mysqli_num_rows($exes) > 0) {
    
    while($row = mysqli_fetch_assoc($exes)) {
        $firstname=$row['fname'];
          $lastname=$row['lname'];
          $problem=$row['problem'];
          $date=$row['dateofhappened'];
          $requestid=$row['request_id'];
          echo '<h1 class="jumbotron-heading">'.$firstname.' '.$lastname.'</h1>'; 
         echo ' <p class="lead text-muted">'.$problem.'</p>';
          echo '<p>';
          ?>
            <a target="_top" href="accept.php?id=<?php echo $row["request_id"] ?>"class="btn btn-primary my-2">ተግባራዊ ያድርጉ </a>
     
           <a target="_top" href="reject.php?id=<?php echo $row["request_id"] ?>" class="btn btn-secondary my-2">አይስማሙ </a>
          </p>
          <?php 
          echo '<small><p>'.$date.'</p></small>';
    }
} else {
    echo "ምንም የሚለጠፍ ጥያቄ የለም።";
}

          
         
           ?>
         
        </div>
      </section>
    </main>

   
  </body>
</html>
