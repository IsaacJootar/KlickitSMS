<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');

class accountschoolFees {
	
	protected static $table_name="acc_school_fees_payments";
	protected static $db_fields = array('id','discount', 'balance', 'student_id', 'item_name', 'bank_name', 'mop', 'trans_id', 'outstand','teller_no', 'class_name', 'have_paid','sess_id', 'term_id', 'expected_to_pay','recieved_by', 'paid_on', 'status');
	public $id;
	public $student_id;
	public $item_name;
	public $bank_name;
	public $teller_no;
	public $class_name;
	public $have_paid;
	public $sess_id;
	public $term_id;
	public $discount;
	public $expected_to_pay;
	public $balance;
	public $paid_on;
	public $recieved_by;
	public $status;
	public $mop; // mode of paymet
	public $trans_id;
	
	
 

	// Common Database Methods
		public static function find_all($sess_id, $term_id) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND `status`=1 "); // 1 is old student
  }
  public static function find_all_new($sess_id, $term_id) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND `status`=0"); // 0 is new student
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
 public static function find_student_type($type='') {
		if($type=='=0'){return 'New students';} if($type=='=1'){ return 'Old students';} if($type=='BETWEEN 0 AND 1'){ return 'Old & New students';}
	 }
public static function find_student_total_fees($sess_id, $term_id, $student_id) {
	 global $database;
		$total_fees = $database->query("SELECT SUM(`have_paid`) AS amount_paid FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND `student_id`='{$student_id}'");
		$total_fees=$database->fetch_array($total_fees);
		$total_fees=$total_fees['amount_paid'];

		$discount = $database->query("SELECT `discount` FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND `student_id`='{$student_id}'");
		$discount=$database->fetch_array($discount);
		return $discount['discount'] + $total_fees;
		
  }
  public static function find_student_total_balance($sess_id, $term_id, $student_id) {
	 global $database;
		$sql = $database->query("SELECT SUM(`balance`) AS balance FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND `student_id`='{$student_id}'");
		$balance=$database->fetch_array($sql);
		return  $balance=$balance['balance'];		
  }

  public static function find_student_total_balance_cummulative($student_id) {
	 global $database;
		$sql = $database->query("SELECT SUM(`balance`) AS balance FROM ".self::$table_name." WHERE  `student_id`='{$student_id}' AND  `item_name` = 'tuition'");
		$balance=$database->fetch_array($sql);
		return  format_currency($balance['balance']);		
  }






  public static function find_fees_by_discount($sess_id, $term_id, $class) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND class_name='{$class}' AND `discount`!=0");
  }
  
  public static function find_student_fees_details($s_id) {
		return self::find_by_sql("SELECT  * FROM ".self::$table_name." WHERE  `student_id`='{$s_id}' AND `item_name`= 'tuition' GROUP BY `student_id`");
  }


   public static function find_fees_all_by_class_and_type($sess_id, $term_id, $class, $type) {
   	global $database;
      if($type=='=0'){
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE  `sess_id`='{$sess_id}' AND  `term_id`='{$term_id}' AND  `class_name` = '{$class}' AND status=0 GROUP BY `student_id` ");
          
      }
            if($type=='=1'){
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE  `sess_id`='{$sess_id}' AND  `term_id`='{$term_id}' AND  `class_name` = '{$class}' AND status=1 GROUP BY `student_id`");
          
            }
      if($type=='BETWEEN 0 AND 1'){
		return self::find_by_sql("SELECT * FROM ".self::$table_name."  WHERE `status` BETWEEN 0 AND 1 AND `sess_id`='{$sess_id}' AND  `term_id`='{$term_id}' AND  `class_name` = '{$class}' GROUP BY `student_id`");
          
      }
  }
  
   public static function find_student_count_by_class_and_type($sess_id, $term_id, $class, $type) {
   	global $database;
      if($type=='=0'){
			$sql=$database->num_rows($database->query("SELECT * FROM ".self::$table_name." WHERE  `sess_id`='{$sess_id}' AND  `term_id`='{$term_id}' AND  `class_name` = '{$class}' AND status=0 GROUP BY `student_id` "));
			return $sql;
          
      }
            if($type=='=1'){
			$sql=$database->num_rows($database->query("SELECT * FROM ".self::$table_name." WHERE  `sess_id`='{$sess_id}' AND  `term_id`='{$term_id}' AND  `class_name` = '{$class}' AND status=1  GROUP BY `student_id`"));
			return $sql;
            }
            
       if($type=='BETWEEN 0 AND 1'){
			$sql=$database->num_rows($database->query("SELECT * FROM ".self::$table_name."  WHERE `status` BETWEEN 0 AND 1 AND `sess_id`='{$sess_id}' AND  `term_id`='{$term_id}' AND  `class_name` = '{$class}' GROUP BY `student_id`"));
			return $sql;
          
      }
  }
  

   public static function find_fees_all_daily($sess_id, $term_id, $type) {
     $date=date("Y-m-d");
       
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `term_id`='{$term_id}' AND `sess_id`='{$sess_id}' AND `date`=$date AND status=$type");
  }
  
  public static function find_fees_all_by_date_range($from, $to) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE  `date` BETWEEN '$from' AND '$to'");
  }
  
   
   public static function find_total_tuition_fee_per_term($sess_id, $term_id, $class, $type) {
   	global $database;
         if($type=='=0'){
       
			$sql=$database->fetch_array($database->query("SELECT sum(have_paid) AS amount FROM ".self::$table_name ."  WHERE  `sess_id`='{$sess_id}' AND  `term_id`='{$term_id}' AND  `class_name` = '{$class}' AND status=0  AND `item_name` ='tuition'"));
			return $sql['amount'];
         }
         if($type=='=1'){
       
			$sql=$database->fetch_array($database->query("SELECT sum(have_paid) AS amount FROM ".self::$table_name ."  WHERE  `sess_id`='{$sess_id}' AND  `term_id`='{$term_id}' AND  `class_name` = '{$class}' AND status=1 AND `item_name` ='tuition'"));
		return $sql['amount'];
         }
         if($type=='BETWEEN 0 AND 1'){
       
			$sql=$database->fetch_array($database->query("SELECT sum(have_paid) AS amount FROM ".self::$table_name ."  WHERE `status` BETWEEN 0 AND 1 AND `sess_id`='{$sess_id}' AND  `term_id`='{$term_id}' AND  `class_name` = '{$class}' AND `item_name` ='tuition'"));
		return $sql['amount'];
         }
    }
	   
	    public static function find_status($type='') {
		if($type==0){return 'New students';} if($type==1){ return 'Old students';} if($type==2){ return 'Old & New students';}
	 }
	   
	   
    public static function find_total_number_of_payments($sess_id, $term_id) {
			$sql=$database->num_rows($database->query("SELECT `id` FROM ".self::$table_name ." WHERE `term_id`='{$term_id}' AND `sess_id`= '{$sess_id}' "));
			return $sql;
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