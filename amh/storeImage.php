<?php
    
    $img = $_POST['image'];
    $folderPath = "upload/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    echo "<script>alert('YOUR IMAGE IS SAVED IN UPLOAD IN FILE NAME OF ($file)'); </script>";
  ?>
  <a href=""  onclick="WINDOW.close();">CLOSE WINDOW</a>
  <script>
      $(element).click(function(){
    window.close();
});
  </script>
   <?php 
?>