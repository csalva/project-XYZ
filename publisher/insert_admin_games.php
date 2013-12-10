<?php
if(isset($_POST['name_game']) && trim($_POST['name_game']) != ''
		&& isset($_POST['description_game']) && trim($_POST['description_game']) != ''
		&& isset($_POST['description_short_game']) && trim($_POST['description_short_game']) != ''
		&& isset($_POST['version_game']) && intval($_POST['version_game']) != 0
		&& isset($_POST['size_game']) && intval($_POST['size_game']) != 0
		&& isset($_POST['id_category']) && intval($_POST['id_category']) != 0){
	
require_once('checksessionPublisher.php');
require_once('../includes/connection.php');
require_once('../includes/func.getPublisherID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}
	require_once('../includes/func.formFilter.php');	
	
	$name_game = htmlentities(utf8_decode(formFilter($_POST['name_game'], 'nombre')));
	$description_game = htmlentities(utf8_decode(formFilter($_POST['description_game'], 'descripcion')));
	$description_short_game = htmlentities(utf8_decode(formFilter($_POST['description_short_game'], 'descripcion_corta')));
	$version = $_POST['version_game'];
	$size = $_POST['size_game'];
	$id_category = $_POST['id_category'];

	$query = <<<EOD
INSERT INTO games
(name_game,description_game,description_short_game,`update`,version,size,status)
VALUES ('{$name_game}','{$description_game}','{$description_short_game}',now(),'{$version}','{$size}',1)
EOD;
	$res = mysql_query($query);
	if(!$res){
	$my_error = mysql_error($connection);
		echo "Ha habido un error al insertar los valores. $my_error";
	}
	else {

		$id_game = mysql_insert_id($res);
		
		$query = <<<EOD
INSERT INTO categories_games
(id_category,id_game)
VALUES ('{$id_category}','{$id_game}')
EOD;
		$res = mysql_query($query, $connection);

		$my_error = mysql_error($connection);
		if(!empty($my_error)){
			echo "Ha habido un error al insertar los valores. $my_error";
		}
		else {

			$query = <<<EOD
INSERT INTO publishers_games
(id_publisher,id_game)
VALUES ('{$id_user}','{$id_game}')					
EOD;
			$res = mysql_query($query, $connection);

			$my_error = mysql_error($connection);
			if(!empty($my_error)){
				echo "Ha habido un error al insertar los valores. $my_error";
			}
			else {
			header('Location: administration.php');
		}
	}
}
}
else {
		echo "Error, no ha introducido todos los datos";
	}
?>
