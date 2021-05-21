<?php
ob_start();
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
include('includes/config2.php');

class resultManagerCumulative {
	
	protected static $table_name="score_entry";
	protected static $db_fields = array('id', 'staff_id', 'session_id', 'term_id','student_id', 'class_name', 'subject_name', 'CA1', 'CA2', 'CA3', 'CA4', 'CA5', 'CA6', 'CA_total','term_total', 'grade','remark','exams', 'status', 'sign', 'p_remark');
	
	public $id;
	public $session_id; 
	public $term;
	public $staff_id;
	public $student_id;
	public $class_name;
	public $subject_name;
	public $CA1;
	public $CA2;
	public $CA3;
	public $CA4;
	public $CA5;
	public $CA6;
	public $CA_total;
	public $grade;
	public $remark;
	public $exam;
	public $status;
	public $sign;
	public $p_remark;
	
	
	

	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }
  public static function full_name($s_id) {
		$sql=mysql_fetch_array(mysql_query("SELECT id, fullname FROM `students` WHERE `id`='{$s_id}' LIMIT 1"));
		return $fullname=$sql['fullname'];
  }
  
  
  public static function find_student_class($s_id, $sess) {
		return $sql=mysql_fetch_array(mysql_query("SELECT `class_name` FROM `score_entry` WHERE `session_id`='{$sess}' AND `term_id` = '{$term}'` AND `student_id`='{$id}'"));
  }
  public static function find_student_name_by_id($s_id) {
		$sql=mysql_fetch_array(mysql_query("SELECT staff_name, `student_id` FROM ".self::$table_name ." WHERE `student_id` = '{$s_id}'"));
		return $sql['staff_name'];
  }
  
  public static function find_student_gender_by_id($s_id) {
		$sql=mysql_fetch_array(mysql_query("SELECT id, `gender` FROM `students` WHERE `id` = '{$s_id}'"));
		return $sql['gender'];
		
  }
   public static function find_student_class_by_id($s_id, $sess) {
	   
		$sql=mysql_fetch_array(mysql_query("SELECT *  FROM ".self::$table_name ." WHERE `student_id` = 
			'{$s_id}' AND `session_id`='{$sess}'"));
		return $sql;
  }
  
   public static function find_student_all_by_id($s_id, $class, $sess) {
	   
		$sql=mysql_query("SELECT DISTINCT `subject_name`   FROM ".self::$table_name ." WHERE `student_id` = '{$s_id}' AND `session_id`='{$sess}'  AND `class_name`='{$class}'");
		return $sql;		
	 }
	 
	 
	 
	   public static function find_first_term_total_score($s_id, $clas, $subj, $sess) {
	// get the sum of score from a class//
	// first the term code//
$term_id=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `term_code` = '1st' AND `sess_id`= '{$sess}'"));
	$term_id=$term_id['id'];
	$query=mysql_fetch_array(mysql_query("SELECT sum(term_total) AS term_total FROM ".self::$table_name ." WHERE  `session_id`='{$sess}' AND `term_id`= '{$term_id}' AND  `class_name`='{$clas}' AND `subject_name`= '{$subj}' AND `student_id`= '{$s_id}'"));
	if(empty($query['term_total'])){return '-';}else{
	return $query['term_total'];
	
	}	
} // end method//
	 
	 public static function find_second_term_total_score($s_id, $clas, $subj, $sess) {
	$term_id=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `term_code` = '2nd' AND `sess_id`= '{$sess}'"));
	$term_id=$term_id['id'];
	$query=mysql_fetch_array(mysql_query("SELECT sum(term_total) AS term_total FROM ".self::$table_name ." WHERE  `session_id`='{$sess}' AND `term_id`= '{$term_id}' AND  `class_name`='{$clas}' AND `subject_name`= '{$subj}' AND `student_id`= '{$s_id}'"));
	if(empty($query['term_total'])){return '-';}else{
		return number_format((float)$query['term_total'], 2, '.', '');
	
	}
}// end method//
	 
public static function find_third_term_total_score($s_id, $clas, $subj, $sess){ $term_id=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `term_code` = '3rd' AND `sess_id`= '{$sess}'"));
	$term_id=$term_id['id'];
	$query=mysql_fetch_array(mysql_query("SELECT sum(term_total) AS term_total FROM ".self::$table_name ." WHERE  `session_id`='{$sess}' AND `term_id`= '{$term_id}' AND  `class_name`='{$clas}' AND `subject_name`= '{$subj}' AND `student_id`= '{$s_id}'"));
	if(empty($query['term_total'])){return '-';}else{
		return number_format((float)$query['term_total'], 2, '.', '');
	
	}
}// end method//

// get total score based on terms taken//

public static function find_cum_total_score($s_id, $class, $subj, $sess) {
	// get the sum of score from a class//
		$query1=mysql_fetch_array(mysql_query("SELECT sum(term_total) AS term_total FROM ".self::$table_name ." WHERE  `session_id`='{$sess}' AND `class_name`='{$class}'  AND `subject_name` ='{$subj}' AND `student_id`= '{$s_id}'"));
		 $total= $query1['term_total'];
		 
		 $num_terms=mysql_num_rows(mysql_query("SELECT distinct `term_id` FROM `score_entry` WHERE  `session_id`='{$sess}' AND `class_name`='{$class}' AND `student_id`= '{$s_id}'"));
              
			return number_format((float)$total/$num_terms, 2, '.', '');			
	 }
	 
	 
	   public static function find_student_average($s_id, $class, $sess) {
	// get the sum of score from by section//
		$query1=mysql_fetch_array(mysql_query("SELECT sum(term_total) AS term_total FROM ".self::$table_name ." WHERE  `session_id`='{$sess}' AND `class_name`='{$class}' AND `student_id`= '{$s_id}'"));
		$total= $query1['term_total'];
		
		//get the number of subj offered//
		$query2=mysql_num_rows(mysql_query("SELECT `subject_name` FROM ".self::$table_name ." WHERE  `session_id`='{$sess}' AND `class_name`='{$class}' AND `student_id`='{$s_id}'"));
		//return $av=$query1['term_total']/$query2;
		return $av=number_format((float)$total/$query2, 2, '.', '');		
	 }
	 
	 
	 
	public static function find_class_highest_score($s_id, $class, $sess, $term) {
	$rank=mysql_fetch_array(mysql_query("SELECT  sum(term_total)  AS term_total FROM score_entry  WHERE `class_name` ='{$class}' AND `session_id`='{$sess}' GROUP BY  `student_id` 
ORDER BY `term_total` DESC
"));
		if(!$rank){echo "error generation highest in class". mysql_error();}
		return $rank['term_total'];

	 }
	 
	public static function find_class_lowest_score($s_id, $class, $sess, $term) {
	$rank=mysql_fetch_array(mysql_query("SELECT  sum(term_total)  AS term_total FROM score_entry  WHERE `class_name` ='{$class}' AND `session_id`='{$sess}' AND `term_id` = '{$term}' GROUP BY  `student_id` 
ORDER BY `term_total` ASC
"));
		if(!$rank){echo "error generation lowest in class". mysql_error();}
		return $rank['term_total'];

	 }
	 
	 
public static function find_class_highest_average($s_id, $class, $sess) {
	$avg_rank=mysql_fetch_array(mysql_query("SELECT student_id, avg, (@rn := @rn + 1) AS rank FROM (SELECT student_id, AVG(term_total) as avg 
		FROM score_entry WHERE `class_name`= '{$class}' AND `session_id`='{$sess}' 
	  GROUP BY student_id ORDER BY AVG(term_total) DESC) agg 
		CROSS JOIN (SELECT @rn := 0) CONST ORDER BY avg DESC"));
		if(!$avg_rank){echo "error computing average_h". mysql_error();}
		return number_format((float) $avg_rank['avg'], 2, '.', '');


	 }
	 
	public static function find_class_lowest_average($s_id, $class, $sess) {
	$avg_rank=mysql_fetch_array(mysql_query("SELECT student_id, avg, (@rn := @rn + 1) AS rank 
		FROM (SELECT student_id, AVG(term_total) as avg 
		FROM score_entry  WHERE `class_name`= '{$class}' AND `session_id`='{$sess}' 
	  GROUP BY student_id ORDER BY AVG(term_total) ASC) agg 
		CROSS JOIN (SELECT @rn := 0) CONST ORDER BY avg ASC"));
		if(!$avg_rank){echo "error computing average_l". mysql_error();}
		return number_format((float)$avg_rank['avg'], 2, '.', '');


	 }
	 
	 
	 	public static function find_class_lowest_in_subject($s_id, $class, $subj, $sess) {
	$avg_rank=mysql_fetch_array(mysql_query("SELECT student_id, avg, (@rn := @rn + 1) AS rank 
		FROM (SELECT student_id, AVG(term_total) as avg 
		FROM score_entry  WHERE `class_name`= '{$class}' AND `subject_name`= '{$subj}' AND `session_id`='{$sess}' 
	  GROUP BY student_id ORDER BY AVG(term_total) ASC) agg 
		CROSS JOIN (SELECT @rn := 0) CONST ORDER BY avg ASC"));
		if(!$avg_rank){echo "error computing lowest in subject". mysql_error();}
		return number_format((float)$avg_rank['avg'], 2, '.', '');


	 }
	 
	 
	 
	 	public static function find_class_highest_in_subject($s_id, $class, $subj, $sess) {
	$avg_rank=mysql_fetch_array(mysql_query("SELECT student_id, avg, (@rn := @rn + 1) AS rank 
		FROM (SELECT student_id, AVG(term_total) as avg 
		FROM score_entry  WHERE `class_name`= '{$class}' AND `subject_name`= '{$subj}' AND `session_id`='{$sess}' 
	  GROUP BY student_id ORDER BY AVG(term_total) DESC) agg 
		CROSS JOIN (SELECT @rn := 0) CONST ORDER BY avg DESC"));
		if(!$avg_rank){echo "error highest in subject". mysql_error();}
		return number_format((float)$avg_rank['avg'], 2, '.', '');


	 }
	 
	 
	 
	 
	  public static function find_num_in_class($s_id, $class, $sess, $term) {
			$sql=mysql_num_rows(mysql_query("SELECT distinct `student_id` FROM `score_entry` WHERE `class_name`='{$class}' AND `session_id`='{$sess}'"));
			return $sql;
	 }
	 
public static function find_position_in_subject($id, $class, $subject, $totalscore, $sess){
	$query = mysql_query("SELECT DISTINCT student_id, class_name, subject_name FROM score_entry WHERE class_name = '$class' AND subject_name = '$subject' AND `session_id`='{$sess}'")  ;
	$position = mysql_num_rows($query) ;
$query3 = mysql_query("SELECT DISTINCT student_id FROM score_entry WHERE class_name = '$class' AND subject_name = '$subject' AND `session_id`='{$sess}' AND student_id != $id")  ;
	while($getscore = mysql_fetch_array($query3)) :
		$query2 = mysql_fetch_array(mysql_query("SELECT * FROM score_entry WHERE  class_name = '$class' AND subject_name = '$subject' AND student_id = '{$getscore['student_id']}' AND `session_id`='{$sess}'" ) ) ;
		if($totalscore >= $query2["term_total"]) :
			$position -- ;
		endif ;
	endwhile ;
	
	
	if (substr($position, -1) == 1 && $position != 11){
     		return $position.'st';
			} elseif(substr($position, -1) == 2 && $position != 12){
    		 return $position.'nd';
			} elseif(substr($position, -1) == 3 && $position != 13){
     		return $position.'rd';
			}else {
     		return $position.'th';
			}
	return $position ;
}



	  public static function find_current_session($sess) {
		$session= mysql_fetch_array(mysql_query("SELECT id, session, status FROM `session_manager` WHERE `id`='{$sess}'"));
	return $session['session'];	
  }
  
   public static function find_current_term($sess, $term) {
		$term=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `id` = '{$term}' AND `sess_id`='{$sess}'"));
	return $term['term_def'];
  
  }


  
  
   public static function find_term_infor($sess, $term) {
		$term_info=mysql_fetch_array(mysql_query("SELECT `next_term_starts` FROM `term_infor` WHERE `sess_id`= '{$sess}' AND `term_id`= '{$term}'"));
	return $term_info['next_term_starts'];
  
  }
   // only for schools that need individual commenting// 
   public static function find_result_comment_by_id($s_id, $sess, $term) {
		$comment=mysql_fetch_array(mysql_query("SELECT f_comment FROM `result_comments` WHERE `student_id`='{$s_id}' AND `sess_id`= $sess AND `term_id`= $term"));
	return $comment['f_comment'];
  
  }
  
  
  public static function find_formaster_remark($s_id, $class, $cum_av){
	 
		// get section_id using the class passed as argument//
		if(!$check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class}'"))){
			echo 'error. could not get section'.mysql_error();
		}
		$sec_id=$check_sec['section_id'];
  		 // pick comments dynamically from the comment table//
		$get_range=mysql_fetch_array(mysql_query("SELECT * FROM `general_comments` WHERE `section_id`='{$sec_id}'
 		AND '{$cum_av}' BETWEEN  `starts` AND `ends` "));
		if(!$get_range){ echo "comment not configured".mysql_error(); }
		if($get_range){ 
		return $get_range['f_comment'];
 
		}



}
   
    public static function find_principal_remark($s_id, $class, $cum_av){
	 
		// get section_id using the class passed as argument//
		if(!$check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class}'"))){
			echo 'error. could not get section'.mysql_error();
		}
		$sec_id=$check_sec['section_id'];
  		 // pick comments dynamically from the comment table//
		$get_range=mysql_fetch_array(mysql_query("SELECT * FROM `general_comments` WHERE `section_id`='{$sec_id}'
 		AND '{$cum_av}' BETWEEN  `starts` AND `ends` "));
		if(!$get_range){ echo "comment not configured".mysql_error(); }
		if($get_range){ 
		return $get_range['p_comment'];
 
		}



}
   
   
public static function find_grade_by_student_id($s_id, $class,  $subject_name, $total) {
		
		if(!$check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class}'"))){
echo 'error in getting section ID'.mysql_error();
}
	$sec_id=$check_sec['section_id'];

  // pick grading dynamically from the grading table//
   $get_range=mysql_fetch_array(mysql_query("SELECT * FROM `grading` WHERE `section_id`='{$sec_id}'
 AND '{$total}' BETWEEN  `starts` AND `ends` "));
if(!$get_range){ echo "Error in calculating grade".mysql_error(); exit();}
if($get_range){ 
 return $grade=$get_range['grade']; // description//
 
}
							
													
  }// end method
  
  
  
   public static function find_remark_by_student_id($s_id, $class,  $subject_name, $total) {
		
				if(!$check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class}'"))){
		echo 'error in getting section ID'.mysql_error();
		}

		   $sec_id=$check_sec['section_id'];

		   // pick grading dynamically from the grading table//
		   $get_range=mysql_fetch_array(mysql_query("SELECT * FROM `grading` WHERE `section_id`='{$sec_id}'
		 AND '{$total}' BETWEEN  `starts` AND `ends` "));
		if(!$get_range){
		 echo "Error in calculating remark".mysql_error(); exit();
		}
		if($get_range){ 
		 return $grade=$get_range['descp']; // description//
		 
		}
 
	}
	
	
}

?>