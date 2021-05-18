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
	<title>REPORT</title>
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
body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}

table
{
    border-collapse: separate;
}

tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: " " counter(Serial); /* Display the counter */
}
.auto-index td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: "Serial is: " counter(Serial); /* Display the counter */
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
      <div class="navbar navbar-dark bg-dark box-shadow">
      	 <a href="admin.php" class="btn btn-info" class="pull-left justify-content-start">HOME</a>
        <div class="container d-flex justify-content-end">
          <?php 
          $sele="SELECT * FROM admin where username='$username' ";
          $exee=mysqli_query($con,$sele);
          $row=mysqli_fetch_array($exee);
          echo '<img  style="vertical-align:middle" height="115" width="110" src="data:image/jpeg;base64,'.base64_encode( $row['profilepic'] ).'"/>';
          echo " ";
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
<div  id="bb" class="container">
  <div class="row">
    <div class="col-md-12">
      <?php 
      $select="SELECT * FROM requests";
      $execute=mysqli_query($con,$select);
       $select_expert="SELECT * FROM expert";
      $execute_select_expert=mysqli_query($con,$select_expert);
    
      $total_request="SELECT * FROM requests where status='fixed' ";
                  $exesb=mysqli_query($con,$total_request);
$totalreq=mysqli_num_rows($exesb);

      echo "<h3>TOTAL FIXED REQUEST:$totalreq</h3>";
    
      if (mysqli_num_rows($execute)>0) {

 echo "<table class='table table-borderd table-striped' class='form-control' id='report_for_office' class='report_for_office'>";
       echo "<tr>"; 
         echo "<th>#</th>"; 
        echo "<th>OFFICE NAME</th>";
       echo "<th>SENT REQUEST</th>"; 
echo "</tr>";



      $select="SELECT * FROM office";
      $execute=mysqli_query($con,$select);
        while ( $office=mysqli_fetch_array($execute)) {
      $block_id=$office['block_number'];
      $office_id=$office['office_id'];
       $select_office="SELECT * FROM requests WHERE blockid='$block_id' AND officeid=' $office_id' ";
        $exe_select_office=mysqli_query($con,$select_office);
        $num=mysqli_num_rows($exe_select_office);
        echo "<tr>"; 
       
echo "<td></td>"; 
echo "<td>" . $office['office_description'] . "</td>";

     echo "<td>".$num."</td>";    
     echo "</tr>";
     
         }

       

  
      
}else{
        echo "THERE IS NO REPORT BECAUSE OF THERE IS NO SENT REQUEST";
      }

         ?>
      </table>
      
      <button onclick="makepdf()" class="btn btn-info">CLICK HERE TO PRINT OR TO SAVE REPORT </button>
      <br>
      <br>

</div>
  </div>
</div>

<script >
  function makepdf() {
   var printme=document.getElementById("report_for_office");
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