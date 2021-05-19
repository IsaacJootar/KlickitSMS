<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');

class accountsmonthlypayrollconfig {
	
	protected static $table_name="acc_staff_monthly_payroll";
	protected static $db_fields = array('id','staff_id', 'debit_item', 'debit_amount', 'fullname','gender','payroll_group','salary_amount', 'coo_status','sess_id', 'term_id','configured_on','payroll_month');
	
	
	
	
	public $id;
	public $staff_id;
	public $debit_item;
	public $debit_amount;
	public $fullname;
	public $gender;
	public $payroll_group;
	public $salary_amount;
	public $payroll_month;
	public $coo_status;
	public $sess_id;
	public $term_id;
	public $configured_on;
	
	
 

	// Common Database Methods
		public static function find_all($sess_id, $term_id) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' ");
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

public static function find_pr_staff_gross_salary($sess_id, $term_id, $staff_id) {
	 global $database;
		$gross = $database->query("SELECT `salary_amount` FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND `staff_id`='{$staff_id}'");
		$gross=$database->fetch_array($gross);
		return $gross=$gross['salary_amount'];
		
  }
 
  public static function find_pr_staff_deductions($sess_id, $term_id, $staff_id) {
	 global $database;
		$debit = $database->query("SELECT SUM(`debit_amount`) AS debit FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND `staff_id`='$staff_id'");
		$debit=$database->fetch_array($debit);
		return $debit=$debit['debit'];
		
  }
   public static function find_pr_staff_net_salary($sess_id, $term_id, $staff_id) {
	 global $database;
		$net = $database->query("SELECT `salary_amount` FROM ".self::$table_name." WHERE `sess_id`= '{$sess_id}' AND `term_id`='{$term_id}' AND `staff_id`='{$staff_id}'");
			$net=$database->fetch_array($net);
		return 	$nets=$net['salary_amount']-self::find_pr_staff_deductions($sess_id, $term_id, $staff_id);// subtracted from the return result in the deduction method//
	
  }
  
  // general pay slips methods//
  public static function find_pr_gross_salary($year, $month, $staff_id) {
	 global $database;
		$gross = $database->query("SELECT `salary_amount` FROM ".self::$table_name." WHERE `payroll_year`= '{$year}' AND `payroll_month`='{$month}' AND `staff_id`='{$staff_id}'");
		$gross=$database->fetch_array($gross);
		return $gross=$gross['salary_amount'];

  }
 
  public static function find_pr_deductions($year, $month, $staff_id) {
	 global $database;
		$debit = $database->query("SELECT SUM(`debit_amount`) AS debit FROM ".self::$table_name."  WHERE `payroll_year`= '{$year}' AND `payroll_month`='{$month}' AND `staff_id`='{$staff_id}'");
		$debit=$database->fetch_array($debit);
		return $debit=$debit['debit'];
		
  }
   public static function find_pr_net_salary($year, $month, $staff_id) {
	 global $database;
		$net = $database->query("SELECT `salary_amount` FROM ".self::$table_name." WHERE `payroll_year`= '{$year}' AND `payroll_month`='{$month}' AND `staff_id`='{$staff_id}'");
			$net=$database->fetch_array($net);
		return 	$nets=$net['salary_amount']-self::find_pr_deductions($year, $month, $staff_id);// salary amount minus the deduction from the returned result in the deduction method//
	
		
  }
   public static function find_pr_total_net_salary($year, $month) {
	 global $database;
		$total_net = $database->query("SELECT *, SUM(`salary_amount`) AS total_net FROM `acc_staff_monthly_payroll` GROUP BY `staff_id`");
				$total_net=$database->fetch_array($total_net);
		return $total_net=	$total_net['total_net'];
		
  }
  

 public static  function format_currency($val,$symbol='₦',$r=2)
{


    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = strlen($i)) > 3) ? $j % 2 : 0; 

   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

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
		$sql .= " WHERE staff_id=". $database->escape_value($this->staff_id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
	  $sql = "DELETE FROM ".self::$table_name;
	  $sql .= " WHERE staff_id=". $database->escape_value($this->staff_id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

}

?>