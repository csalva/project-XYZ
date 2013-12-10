<?php
function buildLogout ($connection){

	require_once('func.getUserID.php');
	$login = getUserID($connection);
	if ($login == false){
		return <<<EOD
<div id="login_sesion" name="login_sesion">
	<p>Iniciar sesi&oacute;n</p>
</div>	
EOD;
	}
	return <<<EOD
<div class="logout_user"><a href="logout.php?id_user={$login['id_user']}">{$login['name_user']} {$login['last_name_user']}</a><span class="ui-icon ui-icon-power"></span></div>
EOD;

}

?>
