<?php
if (!isset($_GET['id_photo']) || intval($_GET['id_photo']) == 0)
exit();

require_once('checksessionPublisher.php');
require_once('../includes/connection.php');
require_once('../includes/func.getPublisherID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

$id_photo = intval($_GET['id_photo']);

$query = <<<EOD
UPDATE photos
SET `status_photo`=0
WHERE id_photo={$id_photo}
EOD;

if (!mysql_query($query, $connection))
	echo 'KO';
else
	echo 'OK';

exit();
?>
