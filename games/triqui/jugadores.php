<?php
require_once('../../includes/connection.php');

$query = <<<EOD
SELECT *
FROM users
WHERE `status`=1
ORDER BY name_user
EOD;
$res = mysql_query($query,$connection);
$lista = array();
while($usuarios = mysql_fetch_assoc($res)){
	$lista[$usuarios['id_user']] = $usuarios['name_user'].' '.$usuarios['last_name_user'];
}

echo json_encode($lista);
?>
