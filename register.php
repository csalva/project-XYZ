<?php
require_once('includes/template.php');

$code = <<<EOD

EOD;

openHeader('Project XYZ', 'styles/styles.css', $code);
openBody('CREAR UNA CUENTA');
?>
<div id="signin_form">
	<form action="insert_data_users.php" method="post">
	<p>Una nueva cuenta gratis en XYZ-games.</p><p>Unirse es muy sencillo y, adem&aacute;s, gratis. Contin&uacute;a para crear tu cuenta, rellena el formulario que tienes m&aacute;s abajo.</p>
	<div id="name-user" class="name-user">
		<input type="text" name="name_user" id="name_user" placeholder="Nombre">
	</div>
	<div id="last-name-user" class="last-name-user">
		<input type="text" name="last_name_user" id="last_name_user" placeholder="Apellidos">
	</div>
	<div id="mail-user" class="mail-user">
		<input type="text" name="mail_user" id="mail_user" placeholder="Correo electr&oacute;nico">
	</div>
	<div id="password-user" class="password-user">
		<input type="password" name="password_user" id="password_user" placeholder="Contrase&ntilde;a">
	</div>
	<div id="confirm-password-user" class="confirm-password-user">
		<input type="password" name="confirm_password_user" id="confirm_password_user" placeholder="Confirmar contrase&ntilde;a">
	</div>

	<div id="submit"><input type="submit" id="signin" name="signin" value="Crear cuenta">
	</div>
	</form>
</div>
<?php
closeBody();
?>
