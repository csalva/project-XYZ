<?php
if (!isset($_POST['login_name']) || trim($_POST['login_name']) == ''
		|| !isset($_POST['login_password']) || trim($_POST['login_password']) == ''){
	echo "Error: Faltan datos";
	exit();
}

$host = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = "P@ssw0rd"; // Mysql password 
$db_name = "xyz_db"; // Database name 

// Connect to server and select databse.
mysql_connect($host, $username, $password) or die("cannot connect"); 
mysql_select_db($db_name)or die("cannot select DB");

// username and password sent from form 
$email = ($_POST['login_name']); 
$pass = md5($_POST['login_password']);

$query = <<<EOD
SELECT *
FROM publishers
WHERE mail_publisher='{$email}'
AND	password_publisher='{$pass}'
EOD;
$result = mysql_query($query);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if ($count == 1) {
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	session_start();

	$_SESSION['login'] = $email;

	header('Location: administration.php');
	exit();
}
else {
	header('Location: index.php');
}
?>
