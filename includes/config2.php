<?Php
/////// Update your database login details here /////
$dbhost_name = "localhost"; // Your host name 
$database1 = "klickits_test";       // Your database name
$username = "root";            // Your login userid 
$password = "";            // Your password 
//////// End of database details of your server //////

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database1, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$con=mysql_connect('localhost', 'root', '');
if(!$con)
{
	die("could not connect to the database");
}
$sel=mysql_select_db($database1);
	if (!$sel)
{echo "error2". mysql_error();}

?>
