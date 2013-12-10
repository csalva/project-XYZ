<?php
if(isset($_GET['id_user']) && ($id_game = intval($_GET['id_user'])) != 0
		&& isset($_GET['id_game']) && ($id_user = intval($_GET['id_game'])) != 0
		&& isset($_GET['score']) && ($score = intval($_GET['score'])) != 0){
		
	require_once('includes/connection.php');
	
$query = <<<EOD
INSERT INTO scores
(id_user,id_game,score,date)
VALUES ('{$id_user}','{$id_game}','{$score}',now())
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
