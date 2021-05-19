<?php 
require_once('database.php');

class director {
 
	public static function find_num_of_classes() {
		global $database;
		$class_num=$database->query("SELECT * FROM `classes`");
		$class_num=$database->num_rows($class_num);
		return $class_num;
  }
  
 public static function find_num_of_male() {
	 global $database;
		$num_male=$database->query("SELECT `gender` FROM `student_class` WHERE `gender`='male'");
		$num_male=$database->num_rows($num_male);
		return $num_male;
  }
   public static function find_num_of_students() {
	 global $database;
		$num_students=$database->query("SELECT `student_id` FROM `student_class`");
		$num_students=$database->num_rows($num_students);
		return $num_students;
  }
  
  
   public static function find_num_of_staff() {
	 global $database;
		$num_students=$database->query("SELECT `id` FROM `staff`");
		$num_students=$database->num_rows($num_students);
		return $num_students;
  }
  
public static function find_num_of_female() {
	 global $database;
		$num_female=$database->query("SELECT `gender` FROM `student_class` WHERE `gender`='female'");
		$num_female=$database->num_rows($num_female);
		return $num_female;
  }
  
  public static function find_num_of_sec() {
	   global $database;
		$num_sec=$database->query("SELECT `id` FROM `section`");
		$num_sec=$database->num_rows($num_sec);
		return 	$num_sec;
  }
  
	 public static function find_num_of_bank() {
		  global $database;
		$num_bank=$database->query("SELECT `id` FROM `acc_bank`");
		$num_bank=$database->num_rows($num_bank);
		return $num_bank;
  }
   public static function find_num_of_fees() {
		  global $database;
		$num_fees=$database->query("SELECT `student_id` FROM `acc_student_fees`");
		$num_fees=$database->num_rows($num_fees);
		return $num_fees;
  }
   public static function find_num_of_bus() {
		  global $database;
		$num_bus=$database->query("SELECT `student_id` FROM `acc_student_bus`");
			$num_bus=$database->num_rows($num_bus);
		return 	$num_bus;
  }
   public static function find_num_of_graduates() {
		  global $database;
		$num_grads=$database->query("SELECT * FROM `student_graduates`");
			$num_grads=$database->num_rows($num_grads);
		return 	$num_grads;
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
	
}

?>