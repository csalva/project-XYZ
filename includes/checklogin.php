<?php
if (!isset($_POST['mail_user']) || trim($_POST['mail_user']) == ''
		|| !isset($_POST['password_user']) || trim($_POST['password_user']) == ''){
	echo "Error: Faltan datos";
	exit();
}

require_once('func.formFilter.php');
require_once('connection.php');

// username and password sent from form 
$email = formFilter($_POST['mail_user'],"nombre"); 
$pass = md5($_POST['password_user']);

$query = <<<EOD
SELECT *
FROM users
WHERE mail_user='{$email}'
AND	password_user='{$pass}'
EOD;
$result = mysql_query($query);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if ($count == 1) {
	session_start();

	$_SESSION['login'] = $email;

	header('Location: ../index.php');
	exit();
}
else {
	header('Location: ../index.php');
}
?>
