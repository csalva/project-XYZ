<?php
if(isset($_POST['id_game']) && ($id_game = intval($_POST['id_game'])) != 0
		&& isset($_POST['id_user']) && ($id_user = intval($_POST['id_user'])) != 0
		&& isset($_POST['valor_donacion']) && ($valor_donacion = floatval($_POST['valor_donacion'])) != 0){
		
	require_once('includes/connection.php');
	
$query = <<<EOD
INSERT INTO donations
(id_user,id_game,money,date)
VALUES ('{$id_user}','{$id_game}','{$valor_donacion}',now())
EOD;

mysql_query($query, $connection);

$my_error = mysql_error($connection);
if(!empty($my_error)){
	echo "KO";
}

else {
	echo "OK";
}

}

?>
