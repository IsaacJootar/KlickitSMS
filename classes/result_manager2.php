<?php
ob_start();
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
include('includes/config2.php');

class resultManager2 {
	
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
  public static function full_name($id) {
		$sql=mysql_fetch_array(mysql_query("SELECT fullname FROM `students` WHERE `id`='{$id}' LIMIT 1"));
		return $fullname=$sql['fullname'];
  }
  
  
  public static function find_student_class($id) {
		return $sql=mysql_fetch_array(mysql_query("SELECT `class_name` FROM `score_entry` WHERE `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'` AND `student_id`='{$id}'"));
  }
  public static function find_student_name_by_id($id) {
		$sql=mysql_fetch_array(mysql_query("SELECT staff_name FROM ".self::$table_name ." WHERE `student_id` = '{$id}'"));
		return $sql['staff_name'];
  }
  
  public static function find_student_gender_by_id($id) {
		$sql=mysql_fetch_array(mysql_query("SELECT `gender` FROM `students` WHERE `id` = '{$id}'"));
		return $sql['gender'];
		
  }
   public static function find_student_class_by_id($id, $sess_id, $term_id) {
	   
		$sql=mysql_fetch_array(mysql_query("SELECT class_name FROM ".self::$table_name ." WHERE `student_id` = '{$id}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'"));
		return $sql;
  }
  
   public static function find_student_all_by_id($id, $class, $sess_id, $term_id) {
	   
		$sql=mysql_query("SELECT * FROM ".self::$table_name ." WHERE `student_id` = '{$id}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$class}'");
		return $sql;		
	 }
	 
	  public static function find_student_average($id, $class, $sess_id, $term_id) {
	// get the sum of score from a class//
		$query1=mysql_fetch_array(mysql_query("SELECT sum(term_total) AS term_total FROM ".self::$table_name ." WHERE  `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$class}' AND `student_id`= '{$id}'")); // add subject in the where clause to get subject average
		$query2=mysql_num_rows(mysql_query("SELECT distinct `subject_name`  FROM ".self::$table_name ." WHERE  `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$class}' AND `student_id`='{$id}'"));
		//return $av=$query1['term_total']/$query2;
			return $av=number_format((float)$query1['term_total']/$query2, 2, '.', '');	
	 }



public static function find_class_average($id, $class, $sess_id, $term_id){
		$q=mysql_query("select sum(term_total) as term_total from score_entry where session_id='{$sess_id}' and `term_id`='{$term_id}' AND `class_name`= '{$class}'");
		$q1=mysql_query("select distinct student_id from score_entry where `session_id`='$sess_id' and `term_id`='{$term_id}' AND `class_name`='$class'");
		if(mysql_num_rows($q1)>0){
			$qs=mysql_fetch_array($q);
			$qs1=mysql_num_rows($q1);
			return number_format((float)$qs['term_total']/$qs1, 2, '.', '');
		}
		return;
	}


 
  public static function find_class_highest_ave($id, $class, $sess_id, $term_id) {
  
 $rank=mysql_fetch_array(mysql_query("select student_id, avg(term_total) as ave
from score_entry WHERE `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$class}'
group by student_id
order by ave desc
limit 1"));
return $rank['ave'];
  }

	 
	 public static function find_class_highest_score($s_id, $class, $sess, $term) {
	$rank=mysql_fetch_array(mysql_query("SELECT  sum(term_total)  AS term_total FROM score_entry  WHERE `class_name` ='{$class}' AND `session_id`='{$sess}' AND `term_id` = '{$term}' GROUP BY  `student_id` 
ORDER BY `term_total` DESC
"));
		if(!$rank){echo "error". mysql_error();}
		return $rank['term_total'];

	 }
	 
	public static function find_class_lowest_score($s_id, $class, $sess, $term) {
	$rank=mysql_fetch_array(mysql_query("SELECT  sum(term_total)  AS term_total FROM score_entry  WHERE `class_name` ='{$class}' AND `session_id`='{$sess}' AND `term_id` = '{$term}' GROUP BY  `student_id` 
ORDER BY `term_total` ASC
"));
		if(!$rank){echo "error". mysql_error();}
		return $rank['term_total'];

	 }



 public static function find_class_highest_average($s_id, $class, $sess, $term) {
	$avg_rank=mysql_fetch_array(mysql_query("SELECT student_id, avg, (@rn := @rn + 1) AS rank FROM (SELECT student_id, AVG(term_total) as avg 
		FROM score_entry WHERE `class_name`= '{$class}' AND `session_id`='{$sess}' 
		AND `term_id`= '{$term}'  GROUP BY student_id ORDER BY AVG(term_total) DESC) agg 
		CROSS JOIN (SELECT @rn := 0) CONST ORDER BY avg DESC"));
		if(!$avg_rank){echo "error". mysql_error();}
		return number_format((float) $avg_rank['avg'], 2, '.', '');


	 }
	 
	public static function find_class_lowest_average($s_id, $class, $sess, $term) {
	$avg_rank=mysql_fetch_array(mysql_query("SELECT student_id, avg, (@rn := @rn + 1) AS rank FROM (SELECT student_id, AVG(term_total) as avg 
		FROM score_entry  WHERE `class_name`= '{$class}' AND `session_id`='{$sess}' 
		AND `term_id`= '{$term}'  GROUP BY student_id ORDER BY AVG(term_total) ASC) agg 
		CROSS JOIN (SELECT @rn := 0) CONST ORDER BY avg ASC"));
		if(!$avg_rank){echo "error computing average". mysql_error();}
		return number_format((float)$avg_rank['avg'], 2, '.', '');


	 }
	 
	 public static function find_student_total_score($s_id, $class, $sess, $term) {
	$rank=mysql_fetch_array(mysql_query("SELECT  sum(term_total)  AS term_total FROM score_entry  WHERE `class_name` ='{$class}' AND `session_id`='{$sess}' AND `term_id` = '{$term}' AND `student_id` = '{$s_id}'
"));
		if(!$rank){echo "error in getting total score". mysql_error();}
		return $rank['term_total'];

	 }
	 
	 
	

 public static function find_num_in_class($s_id, $class, $sess_id, $term_id) {
			$sql=mysql_num_rows(mysql_query("SELECT distinct `student_id` FROM `score_entry` WHERE `class_name`='{$class}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'"));
			return $sql;
	 }
	 
	public static function find_position_in_subject($id, $class, $subject, $totalscore, $sess_id, $term_id){
	$query = mysql_query("SELECT DISTINCT student_id FROM score_entry WHERE class_name = '$class' AND subject_name = '$subject' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'")  ;
	$position = mysql_num_rows($query) ;
	$query3 = mysql_query("SELECT DISTINCT student_id FROM score_entry WHERE class_name = '$class' AND subject_name = '$subject' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND student_id != $id")  ;
	while($getscore = mysql_fetch_array($query3)) :
		$query2 = mysql_fetch_array(mysql_query("SELECT term_total FROM score_entry WHERE  class_name = '$class' AND subject_name = '$subject' AND student_id = '{$getscore['student_id']}'   AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'" ) ) ;
		if($totalscore >= $query2["term_total"]) :
			$position --;
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


	  public static function find_current_session() {
		$session= mysql_fetch_array(mysql_query("SELECT * FROM `session_manager` WHERE `status`='Current Session'"));
	return $session['session'];	
  }
  
   public static function find_current_term() {
		$term=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `status`='Current Term'"));
	return $term['term_def'];
  
  }
  
   public static function find_term_infor($sess_id, $term_id) {
		$term_info=mysql_fetch_array(mysql_query("SELECT `next_term_starts` FROM `term_infor` WHERE `sess_id`= '{$sess_id}' AND `term_id`= '{$term_id}'"));
	return $term_info['next_term_starts'];
  
  }
  // for schools that need individual commenting// 
   public static function find_result_comment_by_id($id, $sess_id, $term_id) {
		$comment=mysql_fetch_array(mysql_query("SELECT f_comment FROM `result_comments` WHERE `student_id`='{$id}' AND `sess_id`= $sess_id AND `term_id`= $term_id"));
	return $comment['f_comment'];
  
  }
  
  
  public static function find_principal_remark($id, $class, $sess_id, $term_id){
	 
	   // get the sum of score from a class//
		$query1=mysql_fetch_array(mysql_query("SELECT sum(term_total) AS term_total FROM ".self::$table_name ." WHERE  `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$class}' AND `student_id`= '{$id}'")); // add subject in the where clause to get subject average
		$query2=mysql_num_rows(mysql_query("SELECT distinct `subject_name`, `session_id`, `term_id`, `class_name`, `student_id` FROM ".self::$table_name ." WHERE  `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$class}' AND `student_id`='{$id}'"));
		//return $av=$query1['term_total']/$query2;
		 $average=round($query1['term_total']/$query2);	
		
		if(!$check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class}'"))){
echo 'error'.mysql_error();
}

   $sec_id=$check_sec['section_id'];

   // pick comments dynamically from the comment table//
$get_range=mysql_fetch_array(mysql_query("SELECT * FROM `general_comments` WHERE `section_id`='{$sec_id}'
 AND '{$average}' BETWEEN  `starts` AND `ends` "));
if(!$get_range){ echo "principal's comment not configured".mysql_error(); exit();}
if($get_range){ 
 return $p_comment=$get_range['p_comment'];

}

}
public static function find_formaster_remark($id, $class, $sess_id, $term_id){
	 
	   // get the sum of score from a class//
		$query1=mysql_fetch_array(mysql_query("SELECT sum(term_total) AS term_total FROM ".self::$table_name ." WHERE  `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$class}' AND `student_id`= '{$id}'")); // add subject in the where clause to get subject average
		$query2=mysql_num_rows(mysql_query("SELECT distinct `subject_name`, `session_id`, `term_id`, `class_name`, `student_id` FROM ".self::$table_name ." WHERE  `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `class_name`='{$class}' AND `student_id`='{$id}'"));
		//return $av=$query1['term_total']/$query2;
		 $average=round($query1['term_total']/$query2);	
		
		if(!$check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class}'"))){
echo 'error'.mysql_error();
}

   $sec_id=$check_sec['section_id'];

   // pick comments dynamically from the comment table//
$get_range=mysql_fetch_array(mysql_query("SELECT * FROM `general_comments` WHERE `section_id`='{$sec_id}'
 AND '{$average}' BETWEEN  `starts` AND `ends` "));
if(!$get_range){ echo "no comment configured".mysql_error(); exit();}
if($get_range){ 
 return $f_comment=$get_range['f_comment'];
 
}


 }  
 public static function grading_student_by_id($exam, $qid, $subject_name, $class) {
		 $session=mysql_fetch_array(mysql_query("SELECT * FROM `session_manager` WHERE `status`='Current Session'"));
	$sess_id=$session['id'];
	 $term=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `status`='Current Term'"));
	$term_id=$term['id'];
		$sql=mysql_fetch_array(mysql_query("SELECT * FROM ".self::$table_name ." WHERE `student_id` = '{$qid}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name` = '{$subject_name}' AND `class_name`= '{$class}' "));
		$term_total=$sql['CA_total'];
		$term_total=$term_total + $exam;
	if(!$check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class}'"))){
	echo 'error in getting section id'.mysql_error();
	}

   $sec_id=$check_sec['section_id'];

   // pick grading dynamically from the grading table//
$get_range=mysql_fetch_array(mysql_query("SELECT * FROM `grading` WHERE `section_id`='{$sec_id}'
 AND '{$term_total}' BETWEEN  `starts` AND `ends` "));
if(!$get_range){ echo "grading for this total score has not been configured".mysql_error(); exit();}
if($get_range){ 
 $grade=$get_range['grade'];
 $remark=$get_range['descp'];
  } 	 	
 $sql2=(mysql_query("UPDATE `score_entry`
							SET `term_total`= '{$term_total}',
								`exam`=	'{$exam}',
								`grade`='{$grade}',
								`remark`='{$remark}'
						    WHERE `student_id` = '{$qid}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name`= '{$subject_name}' AND `class_name`='{$class}'"));
							
							
													

   

 }// end method
 
 
 public static function grading_student_with_zero_ca_by_id($exam, $qid, $staff_id, $subject_name, $class) {
		 $session=mysql_fetch_array(mysql_query("SELECT * FROM `session_manager` WHERE `status`='Current Session'"));
	$sess_id=$session['id'];
	 $term=mysql_fetch_array(mysql_query("SELECT * FROM `term` WHERE `status`='Current Term'"));
	$term_id=$term['id'];
		$term_total=$exam;
	if(!$check_sec=mysql_fetch_array(mysql_query("SELECT `section_id` FROM `class_section` WHERE `class_name`='{$class}'"))){
	echo 'error in getting section id'.mysql_error();
	}

   $sec_id=$check_sec['section_id'];

   // pick grading dynamically from the grading table//
$get_range=mysql_fetch_array(mysql_query("SELECT * FROM `grading` WHERE `section_id`='{$sec_id}'
 AND '{$term_total}' BETWEEN  `starts` AND `ends` "));
if(!$get_range){ echo "grading for this total score has not been configured".mysql_error(); exit();}
if($get_range){ 
 $grade=$get_range['grade'];
 $remark=$get_range['descp'];
  } 
  
  
  
   $query="SELECT  * FROM `score_entry` WHERE `subject_name`='{$subject_name}' AND `class_name`='{$class}' AND `student_id`='{$qid}'  AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}'";
		 $query=mysql_query($query);
		  if(mysql_num_rows($query) < 1){
			$query="INSERT INTO `score_entry` 
				(`staff_id`, `class_name`, `subject_name`,`session_id`, `term_id`, `student_id`, `exam`, `term_total`) 
		VALUES ('{$staff_id}', '{$class}', '{$subject_name}', '{$sess_id}', '{$term_id}' , '$qid', '{$term_total}', '{$term_total}') ";
			$result=mysql_query($query);
						
		   	}
 $sql2=(mysql_query("UPDATE `score_entry`
							SET `term_total`= '{$term_total}',
								`exam`=	'{$term_total}',
								`grade`='{$grade}',
								`remark`='{$remark}'
						    WHERE `student_id` = '{$qid}' AND `session_id`='{$sess_id}' AND `term_id` = '{$term_id}' AND `subject_name`= '{$subject_name}' AND `class_name`='{$class}'"));
							
							
													

   

 }// end method
 
 
 
 
 public static function find_by_sql() {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }


	private static function instantiate($record) {
		// Could check that $record exists and is an array
    $object = new self;
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}
	
	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  $attributes = array();
	  foreach(self::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}
	
	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}
	
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $database;
	
		$attributes = $this->sanitized_attributes();
	  $sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
	  $sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	  if($database->query($sql)) {
	    $this->id = $database->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}

	public function update() {
	  global $database;
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $database->escape_value($this->id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  $sql = "DELETE FROM ".self::$table_name;
	  $sql .= " WHERE id=". $database->escape_value($this->id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

}

?>