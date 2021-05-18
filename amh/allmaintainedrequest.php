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
	<title>ALL REQUESTS THAT HAVE BEEN SOLVED</title>
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
        <div class="container d-flex justify-content-end">
          <?php 
          $sele="SELECT * FROM admin where username='$username'";
          $exee=mysqli_query($con,$sele);
          $row=mysqli_fetch_array($exee);
          echo '<img  style="vertical-align:middle" height="115" width="110" src="data:image/jpeg;base64,'.base64_encode( $row['profilepic'] ).'"/>';
          echo " ";
      ?>
          <a href="#" class="navbar-brand d-flex align-items-end">
           <strong class="pull-left"><?php echo $username ?></strong>
          </a>
          <div class="pull-right">
            <a href="logoutemploye.php" class="btn btn-danger my-2">LOGOUT</a>
          </div>
        </div>
      </div>
      <br>
      <br>
      <br>
  <div  id="bb" class="container">
  <div class="row">
    <div class="col-md-12">
      <?php 
      $select="SELECT * FROM requests where status='fixed'";
      $execute=mysqli_query($con,$select);
      if (mysqli_num_rows($execute)>0) {
        echo "<table class='table table-borderd table-striped'>";
        echo "<tr>";
       echo "<th>FIRST NAME</th>";
           echo "<th>LASR NAME</th>";
          echo "<th>BLOCK ID</th>";
          echo "<th>OFFICE ID</th>";
          echo "<th>PREVIOUSLY HAPPEND</th>";
          echo "<th>DATE</th>";
          echo "<th>PROBLEM </th>";
          echo "<th>PROBLEM SOLVER EXPERT </th>";
          echo "<th>USER SENT REQUEST </th>";
        echo "</tr>";
        while ($row=mysqli_fetch_array($execute)) {
          echo "<tr>";
         
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['blockid'] . "</td>";
                 echo "<td>" . $row['officeid'] . "</td>";
                echo "<td>" . $row['previousappread'] . "</td>";
                 echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['problem'] . "</td>";
               echo "<td>" . $row['expert'] . "</td>";
                echo "<td>" . $row['byuser'] . "</td>";
                  echo "</tr>";
        }
      
    
echo "</table>";
      }else{
        echo "THERE IS NO REQUST FOR THE OFFICE ";
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