<?php 
include_once 'dbcon.php';
 ?>
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
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>የተጠቃሚ ቅንብር</title>
  <?php 

$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
    ?> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<link rel="stylesheet"  href="bootstrap.min.css">
<link rel="stylesheet"  href="bootstrap.min.css">
	<style type="text/css">
	#box{
    border: 3px solid black;
    border-radius: 20px;
    padding-bottom:  30px;
    width: 100%;
    height: 100%;
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
        echo "&nbsp&nbsp&nbsp";;
      ?>
<a href="#" class="navbar-brand d-flex align-items-end">
           <strong class="pull-left"><?php echo $username ?></strong>
          </a>
          <div class="pull-right">
            <a href="logoutoffichead.php" class="btn btn-danger my-2">ውጣ</a>
          </div>
        </div>
      </div>
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
    </header>
<?php 
$for_setting="SELECT * FROM officehead WHERE username='$username'";
$exe_for_setting=mysqli_query($con,$for_setting);
$row=mysqli_fetch_assoc($exe_for_setting);
$user=$username;
$firstname=$row['firstname'];
$lastname=$row['lasename'];
$password=$row['password'];
 ?>
    <div id="box" class="container">
      <div class="row ">
        <div class="col-md-6">
     <h3>የመጀመሪያ ስም:</h3> 
     <form method="post" action="#">
     <input type="text" class="form-control" name="edfname" id="edfname" required="" disabled="" value="<?php echo $firstname?>" >   
   <button id="savefname"  name="savefname" disabled class="btn btn-success ">ለውጥ</button> <button type="button" onclick="enable()" id="firstname_button"  class="btn btn-success glyphicon glyphicon-pencil">ያርትዑ</button> 
   </form>
   <?php 
   
if (isset($_POST['savefname'])) {
 $firstn=$_POST['edfname'];
 $update_firstname="UPDATE officehead SET firstname='$firstn' WHERE username='$username'";
 $exe_update_firstname=mysqli_query($con,$update_firstname);
 if ($exe_update_firstname) {
echo "<script>alert('ስኬታማ የተለወጠ።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  }else{
    echo "<script>alert('አልተለወጠም።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  } 
}
    ?>
   </div>
   <script >
     function enable(){
      document.getElementById("edfname").disabled = false;
      $('#savefname').removeAttr('disabled');
       //document.getElementById("").disabled = false;
     }
   </script>
   <div class="col-md-6">
     <h3>የአባት ሥም:</h3>
     <form method="post" action="#">
      <input type="text" class="form-control" name="last_name" id="last_name" required="" disabled  value="<?php echo $lastname ?>" > 
      <button name="save_lname" id="save_lname" disabled class="btn btn-success">ለውጥ</button>  <button  onclick="enable_lastname()" type="button" id="lastname_button"  class="btn btn-success glyphicon glyphicon-pencil"  >ያርትዑ</button>     
      </form>
    </div>
    <?php 
if (isset($_POST['save_lname'])) {
        $lname=$_POST['last_name'];
        $up="UPDATE officehead SET lasename='$lname' where username='$username'";
        $exeup=mysqli_query($con,$up);
        if ($exeup) {
echo "<script>alert('ስኬታማ የተለወጠ።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  }else{
    echo "<script>alert('አልተለወጠም።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  } 
}

   ?>
    <script >

     function enable_lastname(){

      document.getElementById("last_name").disabled = false;
       $('#save_lname').removeAttr('disabled');
     }

   </script>
  </div>
  
  <br>
<div class="row">
  <div class="col-md-6">
    <form method="post" action="#">
    የአሁኑ ሚስጥራዊ ማለፊያ ቁልፍ:
<input type="password" name="current" required="" disabled placeholder="******" id="current" class="form-control"> <span id="real_password" name="real_password"></span>

  </div>
  <div class="col-md-6">
  አዲስ የይለፍ ቃል:
  
  <input type="PASSWORD"  name="password" required=""  disabled placeholder="*********" id="password" class="form-control" >
  
  <br>
  <br>
</div>

</div>
<div class="row">
      <div class="col-md-6">
የይለፍ ቃል ጥንካሬ:
  
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
       
         <div class="col-md-6">
   የይለፍ ቃል አረጋግጥ:
  
  <input type="PASSWORD" class="form-control" name="conpass" id="conpass" required="" disabled placeholder="*********">
  <span id='message'></span>
  <br>
  <br>
  <script >
  $('#password, #conpass').on('keyup', function () {
  if ($('#password').val() == $('#conpass').val()) {
    $('#message').html('መመሳሰል').css('color', 'green');
  } else {
    $('#message').html('የማይዛመድ').css('color', 'red');
  }
    
});
  </script>
</div>
</div>
<div class="row">
  <div class="col-md-6 justify-content-center">
<button  onclick="enable_password()" type="button" id="password_bt"  class="btn btn-success glyphicon glyphicon-pencil"  >ያርትዑ</button>      <button id="changepw" name="changepw"  disabled class="btn btn-success">ለውጥ</button>
</div>
</form>
</div>
<br>
<br>
<div class="row">
  <div class="col-md-6">
    <?php 
          $sele="SELECT * FROM officehead where username='$username'";
          $exee=mysqli_query($con,$sele);
          $row=mysqli_fetch_array($exee);
          if (empty($row['profilpic'])) {
            echo '<form method="post" action="#" enctype="multipart/form-data">';
          echo "የመገለጫ ስዕል የለዎትም እባክዎን አዲስ የመገለጫ ስዕል ይምረጡ።<br>";
          echo "<input type='file' class='form-control' required='' id='newmyimage'  name='newmyimage' accept='image/*'><br>";
          echo "<button id='newprofilepic' name='newprofilepic' class='btn btn-success glyphicon glyphicon-plus'>ያክሉ</button>";
          ?>
          </form>
          <?php
            if (isset($_POST['newprofilepic'])) {
           $imagetmp=addslashes (file_get_contents($_FILES['newmyimage']['tmp_name']));
           $up_profile="UPDATE officehead SET profilpic='$imagetmp' WHERE username='$username'";
           $exe_up_profile=mysqli_query($con,$up_profile);
            if ($exe_up_profile) {
echo "<script>alert('ስኬታማ የተለወጠ።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  }else{
    echo "<script>alert('አልተለወጠም።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  } 
            }


          }else{
          echo '<img  style="vertical-align:middle" height="415" width="310" src="data:image/jpeg;base64,'.base64_encode( $row['profilpic'] ).'"/><br>';
          echo "<form method='post' action='#' enctype='multipart/form-data'>";
          echo "<input type='file' class='form-control' required='' id='changemyimage'  name='changemyimage' accept='image/*'><br>";
         
          echo "<button id='changeprofilepic' name='changeprofilepic' class='btn btn-success glyphicon glyphicon-plus'> ለውጥ</button>";
           echo "</form>";
         
          echo "</br>";
       
          
       
         
          if (isset($_POST['changeprofilepic'])) {
          $imagetmp=addslashes (file_get_contents($_FILES['changemyimage']['tmp_name']));
           $up_profile="UPDATE officehead SET profilpic='$imagetmp' WHERE username='$username'";
           $exe_up_profile=mysqli_query($con,$up_profile);

            if ($exe_up_profile) {
echo "<script>alert('ስኬታማ የተለወጠ።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  }else{
    echo "<script>alert('አልተለወጠም።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  } 
          }

          ?>
<form method='post' action='#' enctype='multipart/form-data'>

 <button id='remove_rem' name='remove_rem' class='btn btn-success glyphicon glyphicon-trash'> ሰርዝ</button>
</form>
             <?php 
 
 if (isset($_POST['remove_rem'])) {
              $up_profile="UPDATE officehead SET profilpic=null WHERE username='$username'";
           $exe_up_profile=mysqli_query($con,$up_profile);

            if ($exe_up_profile) {
echo "<script>alert('ስኬታማ የተለወጠ።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  }else{
    echo "<script>alert('አልተለወጠም።');</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  } 
          }
       ?>




          <?php 
        }
          echo " ";
      ?>
<?php 
if (isset($_POST['changepw'])) {
  $current_pw=$_POST['current'];
  $new_pw=$_POST['password'];
  $con_pw=$_POST['conpass'];
$sele_old="SELECT password from officehead where username='$username'";
$exe_sele_old=mysqli_query($con,$sele_old);
$row=mysqli_fetch_array($exe_sele_old);
$password=$row['password'];
if ($password==$current_pw) {
  if ($new_pw==$con_pw) {
    $up_pw="UPDATE officehead set password='$new_pw' where username='$username'";
    $exe_up_pw=mysqli_query($con,$up_pw);

    if ($exe_up_pw) {
     echo "<script>alert('የይለፍ ቃሉ ተቀይሯል።')</script>";
      echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
    }else{
       echo "<script>alert('የይለፍ ቃሉ አልተቀየረም።')</script>";
        echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
    }
  }else{
    echo "<script>alert('ያስገቡት የይለፍ ቃል አልተዛመደም።')</script>";
     echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
  }
}else{
echo "<script>alert('ያስገቡት የመተላለፊያው የይለፍ ቃል የእርስዎ ወቅታዊ የይለፍ ቃል አይደለም።')</script>";
 echo "
    <script>
  window.location='offichead.php';
 </script>
   ";
} 
}
 ?>

  </div>

</div>
</div>
</div>
<script >
  function enable_password(){
      document.getElementById("current").disabled = false;
       document.getElementById("password").disabled = false;
        document.getElementById("conpass").disabled = false;
         $('#changepw').removeAttr('disabled');
  }
</script>
</body>
<?php 
include_once 'footer.php';
 ?>
</html>





















<!-- <script >
  $(document).ready(function(){
    $('#current').on('blur',function(){
      $pw = $('#current').val();
    if ($pw === "") {
      $('#real_password').html('please fill this area');
    }else{
      $.ajax({
        type:'post',
        url:"employesetting2.php",
        data:{
          send_ans_employe:$pw
        },
        dataType:"text",
        success:function(data)
        {
          if(data == "ok"){
            $('#real_password').html("CORRECT PASSWORD").css({'color':'green'});
          }else{
            $('#real_password').html("INCORRECT PASSWORD").css({'color':'red'});
          }
          
        }
      });
    }
    });

  });
    </
</script> -->