<?php
require_once('checksessionAdmin.php');
require_once('../includes/connection.php');
require_once('../includes/func.getAdminID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

require_once('../includes/func.buildLogoutAdmin.php');
$logout = buildLogoutAdmin($connection, $id_user);
require_once ('../includes/templateAdmin.php');

$code = <<<EOD
EOD;

openHeader('Project XYZ', '../styles/stylesAdmin.css', $code);
openBody('Project XYZ: Administració','adminBody');

echo $logout;
require_once('menu.php');
?>

<?php
closeBody();
?>
