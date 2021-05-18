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
	<title>FAQ</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
<link rel="stylesheet"  href="bootstrap.min.css">
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

      #bb{
        border: 3px solid black;
        border-radius: 20px;
        margin: 50px;
        padding: 35px;
        font-weight: bold;
 }#myBtn {
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
          $username=$_SESSION['unemploye'];
     ?>
   <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow navbar-fixed-top">

          <a href="employe.php" class="btn btn-info" class="pull-left">መነሻ</a>
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
     
  <div  id="bb" class="container">
  <div class="row">
    <div class="col-md-9">
      <?php 
      $select="SELECT * FROM requests";
      $execute=mysqli_query($con,$select);
      if (mysqli_num_rows($execute)>0) {
        echo "<table class='table table-borderd table-striped'>";
        echo "<tr>";
       
          echo "<th>ቀን</th>";
          echo "<th>ችግር</th>";
        echo "</tr>";
        while ($row=mysqli_fetch_array($execute)) {
          echo "<tr>";
         
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['problem'] . "</td>";
          echo "</tr>";
        }
      
    
echo "</table>";
      }else{
        echo "ተዘውትረው የሚጠየቁ ጥያቄዎች የሉም ፡፡";
      }

     ?>
      
</div>


</div>
  </div>

</div>

<?php 

include_once 'footer.php' 
?>
  </body>
  </html>