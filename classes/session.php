<?php
class Session {
	
	private $logged_in=false;
	public $user_id;
	public $username;
	public $message;
	
	function __construct() {
		$this->check_message();
		$this->check_login();
    if($this->logged_in) {
      // actions to take if user is logged in
    } else {
      // actions to take if user is not logged in
    }
	}//end construct function
	
  public function is_logged_in() {
    return $this->logged_in;
  }

	public function login($user) {
    // database should find user based on username/password
    if($user){
      $this->user_id = $_SESSION['user_id'] = $user->id;
        $this->username = $_SESSION['username'] = $user->username;
      $this->logged_in = true;
    }
  }
  
  public function logout() {
    unset($_SESSION['user_id']);
    unset($this->user_id);
    unset($_SESSION['username']);
    unset($this->username);
    $this->logged_in = false;
  }

	public function message($msg="") {
	  if(!empty($msg)) {
	   
	    //$this->message=$msg wont work bcus i must assign or store the msg to the session so as to be able to retured it to an attribute
	    $_SESSION['message'] = $msg; // and here i need to store the message into a session to be checked by the check_message() in the _construct method when any page is lunched
	  } else {
	    // else if the msg is empty just go ahead and return the default ""//
			return $this->message;
	  }
	}
 
	
		

	
	public function display_error() {
	  
	   if (isset($_SESSION['sess_errors']) &&  is_array( $_SESSION['sess_errors']) && ($_SESSION['sess_errors'])  > 0)
 		{
		echo '<div class="alert alert-danger">';
		echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
			foreach ($_SESSION['sess_errors'] as $msg)
			{
				echo $msg;
				echo '</br>';
			}
				echo ' </div>';
				unset($_SESSION['sess_errors']);
 		}	
	
}
	
	
	private function check_login() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
     // $this->username = $_SESSION['username'];
      $this->logged_in = true;
    } else {
      unset($this->user_id);
      unset($this->username);
      $this->logged_in = false;
    }
  }
  
	private function check_message() {
		// check if a message is stored is a session?
		if(isset($_SESSION['message'])) {
			// store any found message an your object attribute and erase the session stored sent
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
	}
	
}

$session = new Session();
$message = $session->message(); // its beta i have this erro msg instance wit me that is always refereing to the method, dat way i can even unset the value if i want without touchin the method itself.

?>