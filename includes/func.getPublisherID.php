<?php
function getUserID($connection)
{
	if (!isset($_SESSION))
		session_start();
		
	if (!isset($_SESSION['login']))
		return false;
		
	$login = addslashes(trim($_SESSION['login']));
	
	$query = <<<EOD
SELECT id_publisher
FROM publishers
WHERE mail_publisher='{$login}'
AND `status`=1
EOD;
	
	$res = mysql_query($query, $connection);
	if (mysql_num_rows($res) != 1)
		return false;
	
	$user = mysql_fetch_assoc($res);
	
	return $user['id_publisher'];
}
?>
