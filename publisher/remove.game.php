<?php
if (!isset($_GET['id_game']) || intval($_GET['id_game']) == 0)
exit();

require_once('checksessionPublisher.php');
require_once('../includes/connection.php');
require_once('../includes/func.getPublisherID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

$id_game = intval($_GET['id_game']);

$query = <<<EOD
UPDATE games
SET `status`=0
WHERE id_game={$id_game}
EOD;

if (!mysql_query($query, $connection))
	echo 'KO';
else
	echo 'OK';

exit();
?>
