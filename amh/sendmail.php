
<?php
$to = "biniyambadege4@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: biniyambadege4@gmail.com";
if ( mail($to,$subject,$txt,$headers)) {
 echo "success";
  } else{
  	echo "error";
  }
?>