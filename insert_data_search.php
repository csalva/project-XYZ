<?php
require_once('includes/connection.php');

$query = <<<EOD
SELECT *
FROM games
WHERE status=1
EOD;

if (isset($_POST['name_category']) && trim($_POST['name_category']) != ''){
	$query .= ' AND name_category='.trim($_POST['name_category']);
}

if (isset($_POST['name_game']) && trim($_POST['name_game']) != ''){
	$query .= ' AND name_game='.trim($_POST['name_game']);
}

require_once('includes/connection.php');

$my_error = mysql_error($connection);
if(!empty($my_error)){
	echo "Hi ha hagut un error al insertar els valors. $my_error";
}
else {
	header('Location:search_game.php');
}

?>
