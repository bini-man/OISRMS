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
	<title>ADMIN'S</title>
  <link rel="stylesheet"  href="bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet"  href="bootstrap.min.css">

 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
}
    </style>
  </head>
  <body>
     <button onclick="topFunction()" id="myBtn" title="Go to top">ወደ ላይ </button>
  <script >
    window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
  </script>
    <?php 
          $username=$_SESSION['una'];
     ?>
   <header>
      <div class="collapse bg-dark " id="navbarHeader">
        <div class="container">
          
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow navbar-fixed-top">
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
     
    </header>

    <div class="container">
<div id="fetures" class="row justify-content-around">
   <div class="col ">
<a href="manageadmin.php" title="MANAGE ADMIN'S"> <img src="admin.png"width="250" height="180" ></a>
</div>
 <div class="col ">
<a href="manageemploye.php" title="MANAGE EMPLOYE'S"> <img src="employe.png" width="250" height="180"></a>
</div>
 <div class="col ">
<a href="manageexpert.php" title="MANAGE EXPERT'S"> <img src="expert.png" width="250" height="180"></a> 
</div>
    </div>
        <br>
        <br>
     <div class="row justify-content-around">  
       <div class="col ">
<a href="manageofficehead.php" title="MANAGE OFFICE HEAD'S"> <img src="officehead.png" width="250" height="180"></a> 
</div>
 <div class="col ">
<a href="assignexpert.php" title="ASSIGN EXPERT"><img src="assignexpert.png" width="250" height="180"></a>
</div>
 <div class="col ">
<a href="managegui.php" title="MANAGE GRAPHICAL USER INTERFACE"><img src="graphicaluserinterface.jpg" width="250" height="180"></a>
</div>
    </div> 
        <br>
        <br>
         <div class="row justify-content-center"> 
           <div class="col ">
<a href="manageoffice.php" title="MANAGE OFFICE"> <img src="office.jpeg" width="250" height="180"></a>
 </div>
 <div class="col ">
<a href="register_admin.php" title="REGISTER ADMIN"> <img src="radmin.png"width="250" height="180" ></a>
 </div>
 <div class="col ">
<a href="register_employe.php" title="REGISTER EMPLOYE"> <img src="remploye.png"width="250" height="180" ></a>
</div>
          </div>
        <br>
        <br>
           <div class="row justify-content-center"> 
             <div class="col ">
<a href="regiser_expert.php" title="REGISTER EXPERT"> <img src="rexpert.png"width="250" height="180" ></a>
</div>
 <div class="col ">
<a href="register_office.php" title="REGISTER OFFICE"> <img src="roffice.jpeg"width="250" height="180" ></a>
</div>
 <div class="col ">
<a href="register_officehead.php" title="REGISTER OFFICE HEAD"> <img src="rofficehead.png"width="250" height="180" ></a>
</div>
     </div>
        <br>
        <br>
    <div class="row justify-content-center"> 
      <div class="col ">
 <a href="manageuserlogin.php" title="MANAGE USER LOGIN"> <img src="userlogin.jpg"width="250" height="180" ></a>
 </div>
 <div class="col ">
 <a href="postnotice.php" title="POST NOTICE"> <img src="NOTICE.png"width="250" height="180" ></a>
 </div>
 <div class="col ">
 <a href="managepost.php" title="MANAGE NOTICE"> <img src="mn.png"width="250" height="180" ></a>     
</div>
      </div>
      <br>
        <br>
    <div class="row justify-content-center"> 
      <div class="col ">
       <a href="managerequest.php" title="TO MANAGE ALL REQUESTS"> <img src="managerequest.jpg"width="250" height="180" ></a> 
      </div>
      <div class="col ">
         <a href="report.php" title="TO GENERATE REPORT"> <img src="rip.jpg"width="250" height="180" ></a> 
      </div>
          <div class="col ">
         <a href="manage_report.php" title="TO MANAGE REPORT"> <img src="manage_report.jpg"width="250" height="180" ></a> 
      </div>
      </div>
     <br>
        <br>
</div>
<?php 

include_once 'footer.php' 
?>
  </body>
  </html>