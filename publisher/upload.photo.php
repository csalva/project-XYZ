<?php
if (!isset($_FILES["file"])){
	echo "Debes elegir un archivo";
	exit();
}

if ($_FILES["file"]["name"] == ''){
	echo "Error en el archivo";
	exit();
}

$size = $_FILES["file"]["size"];
$type = $_FILES["file"]["type"];
$name = $_FILES["file"]["name"];
       
$dest =  "/var/www/project-xyz/images/".$name;
if (!move_uploaded_file($_FILES["file"]["tmp_name"], $dest)) {
	echo "Error al subir el archivo";
	exit();
}

require_once('checksessionPublisher.php');
require_once('../includes/connection.php');
require_once('../includes/func.getPublisherID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

$query = <<<EOD
INSERT INTO photos
(name_photo,size_photo,type_photo,date_photo,status_photo)
VALUES ('{$name}','{$size}','{$type}',now(),1)
EOD;


	mysql_query($query, $connection);

	$my_error = mysql_error($connection);
	if(!empty($my_error)){
		echo "Ha habido un error al insertar los valores. $my_error";
	}
	else {
		header('Location: photos.php');
}
?>
