<?php 
ob_start();
session_start();
include_once 'dbcon.php';
if(!isset($_SESSION['username']))
{
?>
 <script>
  alert('YOU ARE NOT ALLOWED TO ACCESS!!Please First go to Forget Password to access the page');
  window.location='login.php';
 </script>
 <?php 
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>የይለፍ ቃል ረሳ </title>
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
<div id="box" class="container">
  <?php 

 $username=$_SESSION['username'];
$role=$_SESSION['role'];
if ($role=="expert") {
  $select_question="SELECT security_question from expert WHERE username='$username'";
  $exe_select_question=mysqli_query($con,$select_question);
  $row=mysqli_fetch_array($exe_select_question);
  $security_question_expert=$row['security_question'];
echo "<h4>ውዴ $username, ያስታውሱ ይህን ጥያቄ መርጠዋል እና ለዚህ ጥያቄ የጥያቄ መልስ ይስጡ ለዚህ ጥያቄ በትክክል መልስ ከሰጡ የይለፍ ቃልዎን መልሰው ማግኘት ይችላሉ የይለፍ ቃልዎን ዳግም ማስጀመር ካልቻሉ በስተቀር። የኢሜል አድራሻዎን ያስታውሱ ከሆነ የኢሜል ማረጋገጫ ዘዴን እንደገና መጠቀም ይችላሉ ፡፡</h4>";
echo "</br>";
echo "</br>";
echo "ጥያቄ 1.";
echo " <h4>$security_question_expert:</h4>";
?>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="#">
    <input type="text" name="answer_expert" id="answer_expert" required="" class="form-control" placeholder="እባክዎን መልስዎን ያስገቡ።">
    <span id="chk_expert"></span>
  <br>
  <br>
       <button name="recover_expert"  class="btn btn-success"   ><span class="glyphicon glyphicon-edit" class="form-control"> አድስ</span></button>
       </form>
  </div>
  <?php 
if (isset($_POST['recover_expert'])) {
  $answer=$_POST['answer_expert'];
  $select_answer_expert="SELECT security_answer FROM expert where username='$username'";
  $exe_select_answer_expert=mysqli_query($con,$select_answer_expert);
  $answerexp=mysqli_fetch_array($exe_select_answer_expert);
  $real_answer_expert=$answerexp['security_answer'];
  if ($real_answer_expert==$answer) {
    $_SESSION['usernameexpert']=$username;
header('location:forget_security4.php');
  }else{
      echo "<script>alert('እርስዎ የገቡት መልሱ ትክክለኛ አይደለም እባክዎን ወደ ትክክለኛው መልስ ያስገቡ ፡፡');</script>";
  }
}
   ?>
  </div>
<?php
}
if ($role=="officehead") {
   $select_question="SELECT security_question from officehead WHERE username='$username'";
  $exe_select_question=mysqli_query($con,$select_question);
  $row=mysqli_fetch_array($exe_select_question);
  $security_question_officehead=$row['security_question'];
  echo "<h4>ውዴ $username, ያስታውሱ ይህን ጥያቄ መርጠዋል እና ለዚህ ጥያቄ የጥያቄ መልስ ይስጡ ለዚህ ጥያቄ በትክክል መልስ ከሰጡ የይለፍ ቃልዎን መልሰው ማግኘት ይችላሉ የይለፍ ቃልዎን ዳግም ማስጀመር ካልቻሉ በስተቀር። የኢሜል አድራሻዎን ያስታውሱ ከሆነ የኢሜል ማረጋገጫ ዘዴን እንደገና መጠቀም ይችላሉ ፡፡</h4>";
  echo "</br>";
echo "</br>";
echo "ጥያቄ 1";
echo " <h4>$security_question_officehead:</h4>";
?>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="#">
    <input type="text" name="answer_officehead" id="answer_officehead" required="" class="form-control" placeholder="እባክዎን መልስዎን ያስገቡ።">
     <span id="chk_officehead"></span>
 
<br>
<br>
       <button name="recover_officehead"  class="btn btn-success"   ><span class="glyphicon glyphicon-edit" class="form-control"> አድስ</span></button>
     </form>
  </div>
  <?php 
if (isset($_POST['recover_officehead'])) {
  $answer=$_POST['answer_officehead'];
  $select_answer_officehead="SELECT security_answer FROM officehead where username='$username'";
  $exe_select_answer_officehead=mysqli_query($con,$select_answer_officehead);
  $answerofh=mysqli_fetch_array($exe_select_answer_officehead);
  $real_answer_officehead=$answerofh['security_answer'];
  if ($real_answer_officehead==$answer) {
 $_SESSION['usernameofficehead']=$username;
header('location:forget_security4.php');
  }else{
      echo "<script>alert('እርስዎ የገቡት መልሱ ትክክለኛ አይደለም እባክዎን ወደ ትክክለኛው መልስ ያስገቡ ፡፡');</script>";
  }
}
   ?>
  </div>
<?php  
}
if ($role=="employe") {
   $select_question="SELECT security_question from employe WHERE username='$username'";
  $exe_select_question=mysqli_query($con,$select_question);
  $row=mysqli_fetch_array($exe_select_question);
  $security_question_employe=$row['security_question'];
  echo "<h4>ውዴ $username, ያስታውሱ ይህን ጥያቄ መርጠዋል እና ለዚህ ጥያቄ የጥያቄ መልስ ይስጡ ለዚህ ጥያቄ በትክክል መልስ ከሰጡ የይለፍ ቃልዎን መልሰው ማግኘት ይችላሉ የይለፍ ቃልዎን ዳግም ማስጀመር ካልቻሉ በስተቀር። የኢሜል አድራሻዎን ያስታውሱ ከሆነ የኢሜል ማረጋገጫ ዘዴን እንደገና መጠቀም ይችላሉ ፡፡</h4>";
  echo "</br>";
echo "</br>";
echo "ጥያቄ 1";
echo " <h4>$security_question_employe:</h4>";
?>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="#"> 
    <input type="text" name="answer_employe" id="answer_employe" required="" class="form-control" placeholder="እባክዎን መልስዎን ያስገቡ።">
     <span id="chk_employe"></span>
  
<br>
<br>

       <button name="recover_employe"  class="btn btn-success"   ><span class="glyphicon glyphicon-edit" class="form-control"> አድስ</span></button>
     </form>
  </div>
  <?php 
if (isset($_POST['recover_employe'])) {
  $answer=$_POST['answer_employe'];
  $select_answer_employe="SELECT security_answer FROM employe where username='$username'";
  $exe_select_answer_employe=mysqli_query($con,$select_answer_employe);
  $answeremp=mysqli_fetch_array($exe_select_answer_employe);
  $real_answer_employe=$answeremp['security_answer'];
  if ($real_answer_employe==$answer) {
 $_SESSION['usernameemploye']=$username;
header('location:forget_security4.php');
  }else{
      echo "<script>alert('እርስዎ የገቡት መልሱ ትክክለኛ አይደለም እባክዎን ወደ ትክክለኛው መልስ ያስገቡ ፡፡');</script>";
  }
}
   ?>
  </div>
<?php
}
   ?>
</div>
</body>
</html> 
<?php 

include 'footer.php';
    ?>
    <script >
      $(document).ready(function(){
    $('#answer_expert').on('blur',function(){
      $ans_expert = $('#answer_expert').val();
    if ($ans_expert === "") {
      $('#chk_expert').html('እባክዎን ይህንን ቦታ ይሙሉ!');
    }else{
      $.ajax({
        type:'post',
        url:"forget_security3.php",
        data:{
          send_ans_expert:$ans_expert
        },
        dataType:"text",
        success:function(data)
        {
          if(data == "ok"){
            $('#chk_expert').html("ትክክለኛ መልስ።").css({'color':'green'});
        $('#recover_expert').prop('disabled', false);
          }else{
            $('#chk_expert').html("የተሳሳተ መልስ።").css({'color':'red'});
             $('#recover_expert').prop('disabled', true);
          }
          
        }
      });
    }
    });

  });


$(document).ready(function(){
    $('#answer_officehead').on('blur',function(){
      $ans_officehead = $('#answer_officehead').val();
    if ($ans_officehead === "") {
      $('#chk_officehead').html('እባክዎን ይህንን ቦታ ይሙሉ!');
    }else{
      $.ajax({
        type:'post',
        url:"forget_security3.php",
        data:{
          send_ans_officehead:$ans_officehead
        },
        dataType:"text",
        success:function(data)
        {
          if(data == "oknw"){

            $('#chk_officehead').html("ትክክለኛ መልስ።").css({'color':'green'});
            
          }else{
            $('#chk_officehead').html("የተሳሳተ መልስ።").css({'color':'red'});
           
          }
          
        }
      });
    }
    });

  });


$(document).ready(function(){
    $('#answer_employe').on('blur',function(){
      $ans_employe = $('#answer_employe').val();
    if ($ans_employe === "") {
      $('#chk_employe').html('እባክዎን ይህንን ቦታ ይሙሉ!');
    }else{
      $.ajax({
        type:'post',
        url:"forget_security3.php",
        data:{
          send_ans_employe:$ans_employe
        },
        dataType:"text",
        success:function(data)
        {
          if(data == "okaydl"){
            $('#chk_employe').html("ትክክለኛ መልስ።").css({'color':'green'});
          }else{
            $('#chk_employe').html("የተሳሳተ መልስ።").css({'color':'red'});
          }
          
        }
      });
    }
    });

  });
    </script>