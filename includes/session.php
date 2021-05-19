<?php	function logged_in() {
		return isset($_SESSION['SESS_USER']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			header('location:index.php');
		}
	}
	
?>	
	
	
<?php /*	
	function table_colors()
	{
		$k= $users['id'];
	if ($k%2!=0) 
		{ echo '<tr bgcolor="#99FFCC">';} 
		
		 else if ($k==0)
		 { echo '<tr bgcolor="#669999">';}
	
	}
	*/
?>


