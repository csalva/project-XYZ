<?php
if (!isset($_POST['id_category']) || intval($_POST['id_category']) == 0)
exit();

require_once('checksessionAdmin.php');
require_once('../includes/connection.php');
require_once('../includes/func.getAdminID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

$id_category = intval($_POST['id_category']);
$name_category = addslashes(htmlentities(utf8_decode(trim($_POST['name_category']))));

$query =  <<<EOD
UPDATE categories
SET name_category='{$name_category}'
WHERE id_category={$id_category}
EOD;

if (!mysql_query($query, $connection))
	echo 'KO';
else
	echo 'OK';

exit();
?>
