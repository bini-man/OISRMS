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
	<title>FIXED REPORT</title>
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
#bb{
        border: 3px solid black;
        border-radius: 20px;
        margin: 50px;
        padding: 35px;
        font-weight: bold;
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
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow navbar-fixed-top">
      	 <a href="admin.php" class="btn btn-info" class="pull-left justify-content-start">HOME</a>
        <div class="container d-flex justify-content-end">
          <?php 
          $sele="SELECT * FROM admin where username='$username' ";
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
<div  id="bb" class="container">
  <div class="row">
    <div class="col-md-12">
      <?php 

      $select="SELECT * FROM expet_status";
      $execute=mysqli_query($con,$select);
      
      
    
      if (mysqli_num_rows($execute)>0) {


       ?>
      <table class='table table-borderd table-striped' class='form-control' id="report" class="report">
        <tr>
          <th>#</th>
        <th>EXPERT NAME</th>
        <th>EXPERT USERNAME</th>
        <th>FIXED REQUEST</th>
        <th>NOT FIXED REQUEST</th>
</tr>
        <?php 
        while ( $expert=mysqli_fetch_array($execute)) {
        
        echo "<tr>"; 
echo "<td>".$expert['id']."</td>";       
echo "<td>".$expert['firstname']." ".$expert['lastname']."</td>";
echo "<td>".$expert['username']."</td>";
echo "<td>".$expert['fixed']."</td>";
echo "<td>".$expert['not_fixed']."</td>";
         echo "</tr>";
         }
}else{
        echo "THERE IS NO REPORT BECAUSE OF THERE IS NO RECIVED REQUEST";
      }

         ?>
      </table>
      
      <button onclick="makepdf()" class="btn btn-info">CLICK HERE TO PRINT OR TO SAVE REPORT </button>
      <br>
      <br>
      <button class="btn btn-danger btn-md remove">Reset Data</button>
  <script type="text/javascript">
    $(".remove").click(function(){
        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'delete.php',
               type: 'POST',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                  alert('DATA SUCCESFULLY RESETED');
                   window.location='report.php';
               }
            });
        }
    });


</script>
</div>
  </div>
</div>

<script >
  function makepdf() {
   var printme=document.getElementById("report");
   var wme=window.open("","","width:2400,height:900");
   wme.document.write(printme.outerHTML);
   wme.document.close();
   wme.focus();
   wme.print();
   wme.close();
  }

</script>
</body>
</html>
<?php 
include_once 'footer.php';
 ?>