<?php
require_once('../includes/templateAdmin.php');

function buildLogoutPublisher ($connection, $id_publisher){
	$query = <<<EOD
SELECT name_publisher
FROM publishers
WHERE id_publisher={$id_publisher}
AND `status`=1
EOD;
	
	$res = mysql_query($query);
	if (mysql_num_rows($res) != 1){
		return false;
	}
	
	$publisher = mysql_fetch_assoc($res);
	
	return <<<EOD
<p title="Cerrar sesi&oacute;n" id="logoutAdmin" align="right"><a href="../logoutPublisher.php?id_publisher={$id_publisher}"><span class="ui-icon ui-icon-power"></span>{$publisher['name_publisher']}</a></p>
EOD;
}

?>
