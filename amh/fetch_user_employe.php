<?php

//fetch_user.php

include('dbcon2.php');
 date_default_timezone_set('America/Los_Angeles');
session_start();

$query = "
SELECT * FROM login 
WHERE user_id != '".$_SESSION['user_id']."' and role='expert' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>የባለሙያ ተጠቃሚ ስም።</td>
  <td>ሁኔታ</td>
  <td>እርምጃ</td>
 </tr>
';

foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="label label-success">በመስመር ላይ</span>';
 }
 else
 {
  $status = '<span class="label label-danger">ከመስመር ውጭ</span>';
 }
 $output .= '
 <tr>
  <td >'.$row['username'].' '.count_unseen_message($row['user_id'],$_SESSION['user_id'],$connect).'</td>
  <td>'.$status.'</td>
  <td><button type="button" title="'.$current_timestamp.'"  class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">ውይይት ጀምር።</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>