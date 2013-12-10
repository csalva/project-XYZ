<?php

if(isset($_POST['name_user']) && trim($_POST['name_user']) != ''
		&& isset($_POST['last_name_user']) && trim($_POST['last_name_user']) != ''
		&& isset($_POST['mail_user']) && trim($_POST['mail_user']) != ''
		&& isset($_POST['password_user']) && trim($_POST['password_user']) != ''
		&& isset($_POST['confirm_password_user']) && trim($_POST['confirm_password_user']) != ''){
		
	if($_POST['password_user'] != $_POST['confirm_password_user']){
		echo "Error: Password y confirmaci&oacute;n diferentes";
		exit();
	}
	
	require_once('includes/func.formFilter.php');	
	
	$email = formFilter($_POST['mail_user'], 'email');
	$first_name = formFilter($_POST['name_user'], 'nombre');
	$last_name = formFilter ($_POST['last_name_user'], 'apellido');
	$password = md5($_POST['password_user']);
	
	require_once('includes/connection.php');

	$query = <<<EOD
INSERT INTO users
(name_user,last_name_user,mail_user,password_user)
VALUES ('{$first_name}','{$last_name}','{$email}','{$password}')
EOD;
	mysql_query($query, $connection);

	$my_error = mysql_error($connection);
	if(!empty($my_error)){
		echo "Ha habido un error al insertar los valores. $my_error";
	}
	else {
		header('Location: index.php');
	}
}
else {
		echo "Error, no ha introducido todos los datos";
	}

?>
