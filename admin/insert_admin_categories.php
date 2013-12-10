<?php
if(isset($_POST['name_category']) && trim($_POST['name_category']) != ''){
	
require_once('checksessionAdmin.php');
require_once('../includes/connection.php');
require_once('../includes/func.getAdminID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}
	require_once('../includes/func.formFilter.php');	
	
	$name_category = htmlentities(utf8_decode(formFilter($_POST['name_category'], 'nombre')));

	$query = <<<EOD
INSERT INTO categories
(name_category,status)
VALUES ('{$name_category}',1)
EOD;
	mysql_query($query, $connection);

	$my_error = mysql_error($connection);
	if(!empty($my_error)){
		echo "Ha habido un error al insertar los valores. $my_error";
	}
	else {
		header('Location: categories.php');
	}
}
else {
		echo "Error, no ha introducido todos los datos";
	}
?>
