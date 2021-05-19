<?php
ob_start();
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
include('includes/config2.php');

class monitorScores {
	
	protected static $table_name="score_entry";
	protected static $db_fields = array('id', 'staff_id', 'session_id', 'term_id','student_id', 'class_name', 'subject_name', 'CA1', 'CA2', 'CA3', 'CA4', 'CA_total','term_total', 'grade','remark','exams', 'status', 'sign', 'p_remark');
	
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
  
  
  public static function find_student_class($s_id, $sess, $term) {
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
   public static function find_student_class_by_id($s_id, $sess, $term) {
	   
		$sql=mysql_fetch_array(mysql_query("SELECT *  FROM ".self::$table_name ." WHERE `student_id` = '{$s_id}' AND `session_id`='{$sess}' AND `term_id` = '{$term}'"));
		return $sql;
  }
  
   public static function find_student_all_by_id($s_id, $class, $sess, $term) {
	   
		$sql=mysql_query("SELECT * FROM ".self::$table_name ." WHERE `student_id` = '{$s_id}' AND `session_id`='{$sess}' AND `term_id` = '{$term}' AND `class_name`='{$class}'");
		return $sql;		
	 }
	 
	   public static function find_student_average($s_id, $class, $sess, $term) {
	// get the sum of score from a class//
		$query1=mysql_fetch_array(mysql_query("SELECT sum(term_total) AS term_total FROM ".self::$table_name ." WHERE  `session_id`='{$sess}' AND `term_id` = '{$term_id}' AND `class_name`='{$class}' AND `student_id`= '{$s_id}'")); // add subject in the where clause to get subject average
		$query2=mysql_num_rows(mysql_query("SELECT distinct `subject_name` FROM ".self::$table_name ." WHERE  `session_id`='{$sess}' AND `term_id` = '{$term}' AND `class_name`='{$class}' AND `student_id`='{$s_id}'"));
		//return $av=$query1['term_total']/$query2;
		return $av=number_format((float)$query1['term_total']/$query2, 2, '.', '');		
	 }
	 
	 public static function find_class_highest_score($s_id, $class, $sess, $term) {
	$rank=mysql_fetch_array(mysql_query("SELECT * FROM ( SELECT s.*, @rank := @rank + 1 rank FROM ( SELECT student_id, class_name, session_id, term_id, sum(term_total) term_total FROM score_entry GROUP BY student_id ) s, (SELECT @rank := 0) init ORDER BY term_total desc ) r WHERE `class_name` ='{$class}' AND `session_id`='{$sess}' AND `term_id` = '{$term}' order by `term_total` desc
"));
		if(!$rank){echo "error". mysql_error();}
		return $rank['term_total']; // highest in class

	 }
	 
	  public static function find_class_lowest_score($s_id, $class, $sess, $term) {
	$rank=mysql_fetch_array(mysql_query("SELECT * FROM ( SELECT s.*, @rank := @rank + 1 rank FROM ( SELECT student_id, class_name, session_id, term_id, sum(term_total) term_total FROM score_entry GROUP BY student_id ) s, (SELECT @rank := 0) init ORDER BY term_total asc ) r WHERE `class_name` ='{$class}' AND `session_id`='{$sess}' AND `term_id` = '{$term}' order by `term_total` asc
"));
		if(!$rank){echo "error". mysql_error();}
		return $rank['term_total']; // lowest in class

	 }
	 
	 
	  public static function find_num_in_class($s_id, $class, $sess, $term) {
			$sql=mysql_num_rows(mysql_query("SELECT distinct `student_id` FROM `score_entry` WHERE `class_name`='{$class}' AND `session_id`='{$sess}' AND `term_id` = '{$term}'"));
			return $sql;
	 }
	 
	public static function find_position_in_subject($class, $subject, $totalscore, $sess, $term){
	$query = mysql_query("SELECT DISTINCT student_id, class_name, subject_name FROM score_entry WHERE class_name = '{$class}' AND subject_name = '{$subject}' AND `session_id`='{$sess}' AND `term_id` = '{$term}'")  ;
	$position = mysql_num_rows($query) ;
	while($getscore = mysql_fetch_array($query)) :
		$query2 = mysql_fetch_array(mysql_query("SELECT * FROM score_entry WHERE  class_name = '{$class}' AND subject_name = '{$subject}' AND student_id = '{$getscore['student_id']}' AND `session_id`='{$sess}' AND `term_id` = '{$term}' " ) ) ;
		if($totalscore > $query2["term_total"]) :
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
		$session= mysql_fetch_array(mysql_query("SELECT * FROM `session_manager` WHERE `id`='{$sess}'"));
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