<?php function redirect_to( $location = NULL ){if ($location != NULL) {
	 header("Location: {$location}");
    exit;
  }
}
function output_message($message="") {
  if (!empty($message)) { 
    return "{$message}</p>";
	
  } else {
    return "";
  }
}



function output_sign($status="") {
   if ($status=='1'){
    echo '<img src="images/mark2.jpg" alt="" width="8" height="8"/>';
   }elseif($status=='0'){
      echo '<img src="images/cross.png" alt="" width="8" height="8"/>';
    }else {echo '-';}
}


 // for attendance
function get_session_term($sess_id, $term_id) {
   global $database;
   $qry=$database->query("SELECT `term_def` FROM `term` WHERE `id`='{$term_id}'");
  $term_def=$database->fetch_array($qry);
  $qry=$database->query("SELECT `session` FROM `session_manager` WHERE `id`='{$sess_id}'");
  $session=$database->fetch_array($qry);
return  $term_def['term_def'].'</br>'.$session['session'];
}
function output_total($student_id, $term_id, $class_name, $week) {
  global $database;
  $sql=$database->query("SELECT 
  SUM(COALESCE(Mon, 0)) 
  + SUM(COALESCE(Tue, 0)) 
  + SUM(COALESCE(Wed, 0)) 
  + SUM(COALESCE(Thu, 0)) 
  + SUM(COALESCE(Fri, 0)) 
  as 'total' FROM `student_attendance` WHERE `class_name`='{$class_name}' 
  AND `term_id` = '{$term_id}' AND `week`='{$week}' AND `student_id`='{$student_id}'");
  $total=$database->fetch_array($sql);
  echo $total['total'];
}


 function format_currency($val,$symbol='₦',$r=2){


    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = strlen($i)) > 3) ? $j % 2 : 0; 

   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

}





function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

?>