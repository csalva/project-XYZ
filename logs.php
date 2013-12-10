<?php
if(isset($_GET['id_game']) && ($id_game = intval($_GET['id_game'])) != 0
		&& isset($_SESSION['id_user']) && ($id_user = intval($_SESSION['id_user'])) != 0){

require_once('includes/connection.php');

$query = <<<EOD
INSERT INTO logs
(id_user,id_game,date)
VALUES ('{$id_user}','{$id_game}',now())
EOD;

mysql_query($query, $connection);

$my_error = mysql_error($connection);
if(!empty($my_error)){
	echo mysql_error();
}

else {
	echo "OK";
}

}

?>
