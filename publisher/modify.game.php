<?php
if (!isset($_POST['id_game']) || intval($_POST['id_game']) == 0)
exit();

require_once('checksessionPublisher.php');
require_once('../includes/connection.php');
require_once('../includes/func.getPublisherID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

$id_game = intval($_POST['id_game']);
$name_game = addslashes(htmlentities(utf8_decode(trim($_POST['name_game']))));
$description = addslashes(trim($_POST['description_game']));

$query =  <<<EOD
UPDATE games
SET name_game='{$name_game}',description_game='{$description}'
WHERE id_game={$id_game}
EOD;

if (!mysql_query($query, $connection))
	echo 'KO';
else
	echo 'OK';

exit();
?>
