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
include_once 'dbcon.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>MANAGE REPORT</title>
  <?php 
$sql="SELECT * FROM toolbar";
$exe=mysqli_query($con,$sql);
$result=mysqli_fetch_array($exe);

  echo '<link rel="icon" type="image" href="data:image/jpeg;base64,'.base64_encode( $result['icon'] ).'"/>';
    ?> 
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet"  href="bootstrap.min.css">
  <link rel="stylesheet"  href="bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>      
    <script src="jquery.tabledit.min.js"></script>
    <style >
       tr:nth-child(even) {
    background-color: #f2f2f2
}
th {
    cursor: pointer;
}
      #myInput {
    background-image: url('searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}
    </style>
    </head> 
  
    <body>  
  
  <div class="container">  
   <br />  
   <br />  
     
            <div class="table-responsive">  
    <h3 align="center">MANAGE REPORT</h3><br />  
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Using First name.." class="col-md-3">
    <br>
    <br>
    <br>
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
  <th onclick="sortTable(0)">ID</th>     
<th onclick="sortTable(1)">FIRST NAME</th>
<th onclick="sortTable(2)">LAST NAME</th>
<th onclick="sortTable(3)">USERNAME</th>
<th onclick="sortTable(4)">FIXED</th>
<th onclick="sortTable(5)">NOT FIXED</th>
      </tr>
     </thead>
     <tbody>
     <?php
     $query = "SELECT * FROM expet_status ORDER BY id DESC";
$result = mysqli_query($con, $query);
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
         <td>'.$row["id"].'</td>
        <td>'.$row["firstname"].'</td>
         <td>'.$row["lastname"].'</td>
         <td>'.$row["username"].'</td>
         <td>'.$row["fixed"].'</td>
         <td>'.$row["not_fixed"].'</td>
          </tr>
      ';
     }
     ?>
     </tbody>
    </table>
   </div>  
  </div>  
 </body>  
</html>  
<script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'actmanagereport.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'firstname'], [2, 'lastname'], [3,'username'], [4,'fixed'], [5,'not_fixed']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
}); 
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("editable_table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
 
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("editable_table");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
 </script>



