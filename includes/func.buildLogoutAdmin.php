<?php
require_once('../includes/templateAdmin.php');

function buildLogoutAdmin ($connection, $id_admin){
	$query = <<<EOD
SELECT name_admin
FROM admins
WHERE id_admin={$id_admin}
AND `status`=1
EOD;
	
	$res = mysql_query($query);
	if (mysql_num_rows($res) != 1){
		return false;
	}
	
	$admin = mysql_fetch_assoc($res);
	
	return <<<EOD
<p title="Cerrar sesi&oacute;n" id="logoutAdmin" align="right"><a href="../logoutAdmin.php?id_admin={$id_admin}"><span class="ui-icon ui-icon-power"></span>{$admin['name_admin']}</a></p>
EOD;
}

?>
