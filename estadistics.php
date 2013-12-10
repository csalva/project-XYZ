<?php
require_once('includes/checksession.php');
require_once('includes/connection.php');
require_once('includes/template.php');
require_once('includes/func.getUserID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

if (!isset($_GET['id_game']))
	exit();

$id_game = intval($_GET['id_game']);

require_once('includes/connection.php');

$code = <<<EOD
EOD;

openHeader('Project XYZ', '/project-xyz/styles/styles.css',$code);
openBody('Estadisticas' , 'mainPage', $connection);

$query = <<<EOD
SELECT s.id_user, u.name_user, s.score
FROM scores s,users u
WHERE s.id_user=u.id_user
AND s.id_game={$id_game}
ORDER BY score DESC
LIMIT 0,5
EOD;

$gameTop = '';
$res = mysql_query($query,$connection);
while($top = mysql_fetch_assoc($res)){
	$gameTop .= <<<EOD
<tr>
<td>{$top['name_user']}</td><td>{$top['score']}</td>
</TR>
EOD;
}

?>
<div class="top">
<table>
<th>Usuario</th><th>SCORE</th>
<?php
echo $gameTop;
?>
</table>
</div>
<?php
closeBody();
?>
