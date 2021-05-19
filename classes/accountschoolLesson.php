<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');

class accountschoolLesson {
	
	protected static $table_name="acc_student_lesson";
	protected static $db_fields = array('id','section_id','discount','student_id','trans_id','bank_id', 'teller_no', 'class_name', 'have_paid','sess_id', 'term_id', 'expected_to_pay','created_by', 'created_on');
	public $id;
	public $section_id;
	public $student_id;
	public $trans_id;
	public $bank_id;
	public $teller_no;
	public $class_name;
	public $have_paid;
	public $sess_id;
	public $term_id;
	public $discount;
	public $expected_to_pay;
	public $created_on;
	public $created_by;
	
	
 

	// Common Database Methods
		public static function find_all($sess_id, $term_id) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}'"); 
  }
  
  public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  }
  
  public static function find_by_sql($sql="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }

public static function find_lesson_fees_by_category($sess_id, $term_id, $class, $cat) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND class_name='{$class}' AND `status`='{$cat}'");
  }
  public static function find_lesson_fees_by_discount($sess_id, $term_id, $class) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND class_name='{$class}' AND `discount`!=0");
  }
  
  public static function find_student_lesson_fees_details($sess_id, $term_id,  $s_id) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND `student_id`='{$s_id}'");
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
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE sec_id=". $database->escape_value($this->sec_id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
	  $sql = "DELETE FROM ".self::$table_name;
	  $sql .= " WHERE id=". $database->escape_value($this->id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

}

?>