<?php 
session_start();
include 'dbcon.php';
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
  <form method="post" action="#">
    
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
    $('#message').html('አልተዛመደም').css('color', 'red');
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
  

$usernameexpert=$_SESSION['usernameexpert'];
$usernameemploye=$_SESSION['usernameemploye'];
$usernameofficehead=$_SESSION['usernameofficehead'];
$role=$_SESSION['role'];
$password=$_POST['password'];
$confiorm_password=$_POST['conpass'];
if ($password==$confiorm_password) {
 
 if ($role=="expert") {
    $insert="UPDATE expert SET password='$password' WHERE username='$usernameexpert' ";
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
    $insert="UPDATE officehead SET password='$password' WHERE username='$usernameofficehead' ";
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
    $insert="UPDATE employe SET password='$password' WHERE username='$usernameemploye' ";
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
    echo "<script>alert('ያስገቡት የይለፍ ቃል ተመሳሳይ አይደለም።');</script>";
}


}
 ?>


<?php
include 'footer.php';
 ?>
</body>
</html>