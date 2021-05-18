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
	<title>MANAGE GRAPHICAL USER INTERFACE</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
    ?>
    <style type="text/css">
      
      #time{
  text-align: right;
}
#icon{
  border: 3px solid black;
  border-radius: 20px;
  margin: 10px;
  margin-top: 30px;
}
#organization{
  border: 3px solid black;
  border-radius: 20px;
  width: 100%;
  margin: 10px;
  margin-top: 30px;
  padding-left: 20px;
}
#leftimage{
  border: 3px solid black;
  border-radius: 20px;
   margin: 10px;
  margin-top: 30px;
}
#rightimg{
  border: 3px solid black;
  border-radius: 20px;
   margin: 10px;
  margin-top: 30px;
}
#slider{
  border: 3px solid black;
  border-radius: 20px;
   margin: 10px;
  margin-top: 30px;
}
#nn{
  margin-left: 20px;
  margin-top: 13px;
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
    </header>
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
<div id="organization" class="container justify-content-center">
  <h3>TO CHANGE ORGANIZATION NAME:
  </h3>
  <form method="post" action="#">
    ORGANIZATION NAME:
   <br>
   <div class="row">
    <div class="col-md-5">
    <input type="text" name="organizationname" required="" placeholder="enter organiztion name" class="form-control" ></div>
    <br>
    <br>
     <div class="col-md-5">
    <input type="text" name="organizationname_am" required="" onkeypress="return (event.charCode > 0 && 
event.charCode < 65 ) || (event.charCode < 65 && 
event.charCode > 91 ) || (event.charCode < 96 && event.charCode > 123 )"  placeholder="የድርጅት ስም በአማርኛ ያስገቡ።" class="form-control" >
  </div></div>
    <br>
    <br>
     <button name="ch"  class="btn btn-success" style="margin-bottom: 20px"  ><span class="glyphicon glyphicon-edit"> CHANGE</span></button>

  </form>
      <?php 
          if (isset($_POST['ch'])) {
              $orgname=$_POST['organizationname'];
              $in_amharic=$_POST['organizationname_am'];
              $sql="UPDATE toolbar SET text='$orgname',am='$in_amharic' WHERE id='0'";
    $exe=mysqli_query($con,$sql);

    if ($exe) {
header("location:managegui.php?Empty=successfuly changed");
      
    }else{
     header("location:managegui.php?Invalid=not changed");
 
    }
          }

       ?>

</div>
<div id="icon" >
  <h3 style="margin-left: 15px;">TO CHANGE TITLEBAR ICON</h3>
  <?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<img height="175" width="180" src="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
    ?>
<h3 style="margin-left: 20px;">TO CHANGE ICON YOU CAN SELECT YOUR NEW ICON:</h3>
<form method="post" action="#" enctype="multipart/form-data">
  <input style="margin-left: 20px;" type="file" name="myimage" required="" accept="image/*" >
  <br>
  <br>
  <button name="change"  class="btn btn-success" style="margin: 20px;"  ><span class="glyphicon glyphicon-edit"> CHANGE</span></button>
</form>
<?php 

if(isset($_POST['change'])) {
    $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $fileinfo= pathinfo($_FILES['myimage']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_allowed ))
    {
    $sql="UPDATE toolbar SET icon='$imagetmp' WHERE id='0'";
    $exe=mysqli_query($con,$sql);

    if ($exe) {
      header("location:managegui.php?Empty=successfuly changed");
      
    }else{
     header("location:managegui.php?Invalid=not changed");
 
    }
    }else{
      header("location:managegui.php?Invalid=PLEASE UPLOAD IMAGE FORMAT ONLY");
 
    }
  }
 ?>
</div>
<div id="rightimg">
  <h3 style="margin-left: 15px;">TO CHANGE HOME PAGE RIGHT IMAGE</h3>
  <?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<img height="175" width="180" src="data:image/jpeg;base64,'.base64_encode( $result['rightimg'] ).'"/>';
    ?>
<h3 style="margin-left: 20px;">TO CHANGE RIGHT IMAGE IN HOMEPAGE YOU CAN SELECT YOUR NEW IMAGE:</h3>
<form method="post" action="#" enctype="multipart/form-data">
  <input style="margin-left: 20px;" type="file" name="myimage" required="" accept="image/*">
  <br>
  <br>
  <button  style="margin: 20px;"name="changer"  class="btn btn-success"   ><span class="glyphicon glyphicon-edit"> CHANGE</span></button>
</form>
<?php 

if(isset($_POST['changer'])) {
    $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $fileinfo= pathinfo($_FILES['myimage']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_allowed ))
    {
    $sql="UPDATE toolbar SET rightimg='$imagetmp' WHERE id='0'";
    $exe=mysqli_query($con,$sql);

    if ($exe) {
      header("location:managegui.php?Empty=successfuly changed");
      
    }else{
     header("location:managegui.php?Invalid=not changed");
 
    }
    }else{
      header("location:managegui.php?Invalid=PLEASE UPLOAD IMAGE FORMAT ONLY");
 
    }
  }
 ?>
</div>
<div id="leftimage">
<h3 style="margin-left: 15px;">TO CHANGE HOME PAGE LEFT IMAGE</h3>
  <?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<img height="175" width="180" src="data:image/jpeg;base64,'.base64_encode( $result['leftimg'] ).'"/>';
    ?>
<h3 style="margin-left: 20px;">TO CHANGE LEFT IMAGE IN HOMEPAGE YOU CAN SELECT YOUR NEW IMAGE:</h3>
<form method="post" action="#" enctype="multipart/form-data">
  <input style="margin-left: 20px;" type="file" name="myimage" required="" accept="image/*">
  <br>
  <br>
  <button name="changel"  class="btn btn-success" style="margin: 20px;"  ><span class="glyphicon glyphicon-edit"> CHANGE</span></button>
</form>
<?php 

if(isset($_POST['changel'])) {
    $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $fileinfo= pathinfo($_FILES['myimage']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_allowed ))
    {
    $sql="UPDATE toolbar SET leftimg='$imagetmp' WHERE id='0'";
    $exe=mysqli_query($con,$sql);
if ($exe) {
      header("location:managegui.php?Empty=successfuly changed");
      
    }else{
     header("location:managegui.php?Invalid=not changed");
 
    }
    }else{
      header("location:managegui.php?Invalid=PLEASE UPLOAD IMAGE FORMAT ONLY");
 
    }
  }
 ?>
</div>
<div id="slider" > 
  <div class="container justify-content-center">
  <h3 style="margin-left: 20px;">  THERE ARE FIVE SLIDER IMAGES YOU CAN UPDATE OR DELET SLIDER IMAGE </h3>
 <div class="row">
  <div class="col-md-6">
  <?php 
$sql="SELECT * FROM slider";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
 echo '<img style="margin-left: 40px;" height="295" width="350" src="data:image/jpeg;base64,'.base64_encode( $result['firstimage'] ).'"/>';
    ?>

       <form id="nn" method="post" action="#" enctype="multipart/form-data">
      

<input type="file" name="myimage" required="" accept="image/*" style="margin-left: 20px;">

  


  <button name="changeR"  class="btn btn-success" style="margin-left: 20px;"  ><span class="glyphicon glyphicon-edit"> CHANGE</span></button>
    </form>
    <?php 
        if (isset($_POST['changeR'])) {
          $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $fileinfo= pathinfo($_FILES['myimage']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_allowed ))
    {
    $sql="UPDATE slider SET firstimage='$imagetmp' WHERE id='1'";
    $exe=mysqli_query($con,$sql);
if ($exe) {
      header("location:managegui.php?Empty=successfuly changed");
      
    }else{
     header("location:managegui.php?Invalid=not changed");
 
    }
    }else{
      header("location:managegui.php?Invalid=PLEASE UPLOAD IMAGE FORMAT ONLY");
 
    }
  }
     ?>

    <form id="nn" method="post" action="#" enctype="multipart/form-data">
        <button name="deleteR"  class="btn btn-success"  style="margin:0px 20px 20px 20px"  ><span class="glyphicon glyphicon-trash"> DELETE</span></button>
    </form>
    <?php 
        if (isset($_POST['deleteR'])) {
            $sql="UPDATE slider SET firstimage=null WHERE id='1' ";
            $exee=mysqli_query($con,$sql);
         if ($exee) {
              header("location:managegui.php?Empty=IMAGE SUCCESSFULY DELETED");
            }else{
              header("location:managegui.php?Invalid=IMAGE NOT DELETED");
 
            }

        }
     ?>
    </div>
    <div class="col-md-6">
  <?php 
$sql="SELECT * FROM slider";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<img height="295" width="350" src="data:image/jpeg;base64,'.base64_encode( $result['secondimage'] ).'"/>';
    ?>

    <form id="nn" method="post" action="#" enctype="multipart/form-data">
      

<input type="file" name="myimage" required="" accept="image/*" >

  


  <button name="changeE"  class="btn btn-success"   ><span class="glyphicon glyphicon-edit"> CHANGE</span></button>
    </form>
<?php 
        if (isset($_POST['changeE'])) {
          $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $fileinfo= pathinfo($_FILES['myimage']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_allowed ))
    {
    $sql="UPDATE slider SET secondimage='$imagetmp' WHERE id='1'";
    $exe=mysqli_query($con,$sql);
if ($exe) {
      header("location:managegui.php?Empty=successfuly changed");
      
    }else{
     header("location:managegui.php?Invalid=not changed");
 
    }
    }else{
      header("location:managegui.php?Invalid=PLEASE UPLOAD IMAGE FORMAT ONLY");
 
    }
  }
     ?>

    <form id="nn" method="post" action="#" enctype="multipart/form-data">
        <button name="deleteE"  class="btn btn-success"  style="margin-bottom: 15px"  ><span class="glyphicon glyphicon-trash"> DELETE</span></button>
    </form>
    <?php 
        if (isset($_POST['deleteE'])) {
            $sql="UPDATE slider SET secondimage=null WHERE id='1' ";
            $exee=mysqli_query($con,$sql);
       if ($exee) {
              header("location:managegui.php?Empty=IMAGE SUCCESSFULY DELETED");
            }else{
              header("location:managegui.php?Invalid=IMAGE NOT DELETED");
 
            }

        }

     ?>
    </div>
   </div>
    <div class="row">
  <div class="col-md-4">
  <?php 
$sql="SELECT * FROM slider";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
 echo '<img height="295" width="350" src="data:image/jpeg;base64,'.base64_encode( $result['thirdimage'] ).'"/>';
    ?>

       <form id="nn" method="post" action="#" enctype="multipart/form-data">
      

<input type="file" name="myimage" required="" accept="image/*" >

  


  <button name="changen"  class="btn btn-success"   ><span class="glyphicon glyphicon-edit"> CHANGE</span></button>
    </form>
<?php 
        if (isset($_POST['changen'])) {
          $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $fileinfo= pathinfo($_FILES['myimage']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_allowed ))
    {
    $sql="UPDATE slider SET thirdimage='$imagetmp' WHERE id='1'";
    $exe=mysqli_query($con,$sql);

    if ($exe) {
      header("location:managegui.php?Empty=successfuly changed");
      
    }else{
     header("location:managegui.php?Invalid=not changed");
 
    }
    }else{
      header("location:managegui.php?Invalid=PLEASE UPLOAD IMAGE FORMAT ONLY");
 
    }
  }
     ?>

    <form id="nn" method="post" action="#" enctype="multipart/form-data">
        <button name="deleten"  class="btn btn-success"   style="margin-bottom: 15px" ><span class="glyphicon glyphicon-trash"> DELETE</span></button>
    </form>
    <?php 
        if (isset($_POST['deleten'])) {
            $sql="UPDATE slider SET thirdimage=null WHERE id='1' ";
            $exee=mysqli_query($con,$sql);
     if ($exee) {
              header("location:managegui.php?Empty=IMAGE SUCCESSFULY DELETED");
            }else{
              header("location:managegui.php?Invalid=IMAGE NOT DELETED");
 
            }

        }

     ?>
    </div>
    <div class="col-md-4">
  <?php 
$sql="SELECT * FROM slider";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

 // echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
echo "&nbsp;&nbsp;&nbsp;";
  echo '<img height="295" width="350" src="data:image/jpeg;base64,'.base64_encode( $result['fourthimage'] ).'"/>';
    ?>

    <form id="nn" method="post" action="#" enctype="multipart/form-data">
      

<input type="file" name="myimage" required="" accept="image/*">

  


  <button name="changuel"  class="btn btn-success"   ><span class="glyphicon glyphicon-edit"> CHANGE</span></button>
    </form>
<?php 
        if (isset($_POST['changuel'])) {
          $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $fileinfo= pathinfo($_FILES['myimage']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_allowed ))
    {
    $sql="UPDATE slider SET fourthimage='$imagetmp' WHERE id='1'";
    $exe=mysqli_query($con,$sql);

  if ($exe) {
      header("location:managegui.php?Empty=successfuly changed");
      
    }else{
     header("location:managegui.php?Invalid=not changed");
 
    }
    }else{
      header("location:managegui.php?Invalid=PLEASE UPLOAD IMAGE FORMAT ONLY");
 
    }
  }

     ?>

    <form id="nn" method="post" action="#" enctype="multipart/form-data">
        <button name="deletell"  class="btn btn-success"  style="margin-bottom: 15px"  ><span class="glyphicon glyphicon-trash"> DELETE</span></button>
    </form>
     <?php 
        if (isset($_POST['deletell'])) {
            $sql="UPDATE slider SET fourthimage=null WHERE id='1' ";
            $exee=mysqli_query($con,$sql);
           if ($exee) {
              header("location:managegui.php?Empty=IMAGE SUCCESSFULY DELETED");
            }else{
              header("location:managegui.php?Invalid=IMAGE NOT DELETED");
 
            }

        }

     ?>
   
   </div>
  <div class="col-md-4">
  <?php 
$sql="SELECT * FROM slider";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
 echo '<img height="295" width="350" src="data:image/jpeg;base64,'.base64_encode( $result['fivithimage'] ).'"/>';
    ?>

       <form id="nn" method="post" action="#" enctype="multipart/form-data">
      

<input type="file" name="myimage" required="" accept="image/*">

  


  <button name="changekk"  class="btn btn-success"   ><span class="glyphicon glyphicon-edit"> CHANGE</span></button>
    </form>
<?php 
        if (isset($_POST['changekk'])) {
          $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
    $fileinfo= pathinfo($_FILES['myimage']['name']);
    $extension_upload = $fileinfo['extension'];
    $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
    if (in_array($extension_upload, $extensions_allowed ))
    {
    $sql="UPDATE slider SET fivithimage='$imagetmp' WHERE id='1'";
    $exe=mysqli_query($con,$sql);

 if ($exe) {
      header("location:managegui.php?Empty=successfuly changed");
      
    }else{
     header("location:managegui.php?Invalid=not changed");
 
    }
    }else{
      header("location:managegui.php?Invalid=PLEASE UPLOAD IMAGE FORMAT ONLY");
 
    }
  }

     ?>


    <form id="nn" method="post" action="#" enctype="multipart/form-data">
        <button name="deletevb"  class="btn btn-success"  style="margin-bottom: 15px" ><span class="glyphicon glyphicon-trash"> DELETE</span></button>
    </form>
    <?php 
        if (isset($_POST['deletevb'])) {
            $sql="UPDATE slider SET fivithimage=null WHERE id='1' ";
            $exee=mysqli_query($con,$sql);
            if ($exee) {
              header("location:managegui.php?Empty=IMAGE SUCCESSFULY DELETED");
            }else{
              header("location:managegui.php?Invalid=IMAGE NOT DELETED");
 
            }

        }

     ?>


</div>
</div>
</div>
</div>
  </body>
 
  </html> 
  <?php 

include_once 'footer.php';
 ?>