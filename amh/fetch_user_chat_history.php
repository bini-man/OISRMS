<?php 
include('dbcon2.php');
session_start();

echo fetch_user_chat_history($_SESSION['user_id'],$_POST['to_user_id'],$connect);

 ?>