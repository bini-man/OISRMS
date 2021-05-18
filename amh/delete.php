<?php 
 include_once("dbcon.php");
 $drop="ALTER TABLE `expet_status`
  DROP `fixed`,
  DROP `not_fixed`";
 $exe_drop=mysqli_query($con,$drop);
 $add="ALTER TABLE `expet_status`
  ADD `fixed` int ,
  ADD `not_fixed` int";
  $exe_add=mysqli_query($con,$add);
   
 ?>