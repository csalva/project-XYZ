<?php
if(isset($_POST['name_game']) && trim($_POST['name_game']) != ''
		&& isset($_POST['description_game']) && trim($_POST['description_game']) != ''){
	
require_once('checksessionAdmin.php');
require_once('../includes/connection.php');
require_once('../includes/func.getAdminID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}
	require_once('../includes/func.formFilter.php');	
	
	$name_game = htmlentities(utf8_decode(formFilter($_POST['name_game'], 'nombre')));
	$description_game = htmlentities(utf8_decode(formFilter($_POST['description_game'], 'descripcion')));

	$query = <<<EOD
INSERT INTO games
(name_game,description_game,status)
VALUES ('{$name_game}','{$description_game}',1)
EOD;
	mysql_query($query, $connection);

	$my_error = mysql_error($connection);
	if(!empty($my_error)){
		echo "Ha habido un error al insertar los valores. $my_error";
	}
	else {
		header('Location: administration.php');
	}
}
else {
		echo "Error, no ha introducido todos los datos";
	}
?>
