<?php ob_start();?>
<?php session_start();?>
<?php
		$_SESSION = array();
		
		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()]))
			 {
				setcookie(session_name(), '', time()-42000, '/');
			 }
		
		// 4. Destroy the session
		session_destroy();
		
		header('location:index.php');
?>

<?php ob_end_flush();?>