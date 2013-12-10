<?php
if (!isset($_GET['id_category']) || intval($_GET['id_category']) == 0)
exit();

require_once('checksessionAdmin.php');
require_once('../includes/connection.php');
require_once('../includes/func.getAdminID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

$id_category = intval($_GET['id_category']);

$query = <<<EOD
UPDATE categories
SET `status`=0
WHERE id_category={$id_category}
EOD;

if (!mysql_query($query, $connection))
	echo 'KO';
else
	echo 'OK';

exit();
?>
