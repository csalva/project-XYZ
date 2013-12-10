<?php
require_once('includes/template.php');
require_once('includes/connection.php');
require_once('includes/func.getUserID.php');
$id_user = getUserID($connection);

$code = <<<EOD

EOD;

openHeader('Project XYZ', 'styles/styles.css', $code);
openBody('Juegos disponibles','mainPage', $connection);

$query = <<<EOD
SELECT *
FROM games_photos gp, photos p
WHERE p.id_photo=gp.id_photo
AND p.status_photo=1
ORDER BY gp.id_game_photo ASC
EOD;

if(!($res = mysql_query($query, $connection))){
	echo 'KO';
	exit();
}

$array_game_photo = array();

while ($file = mysql_fetch_assoc($res)){
$array_game_photo[$file['id_game']] = $file['name_photo'];
}

$query = <<<EOD
SELECT *
FROM games
WHERE status = 1
AND id_parent_game = 0
ORDER BY name_game
EOD;

$res = mysql_query($query,$connection);
$gamesList = '';
while ($games = mysql_fetch_assoc($res)){
if (!isset($array_game_photo[$games['id_game']]) || $array_game_photo[$games['id_game']] == '')
	$photo = "noimage.jpg";
else
	$photo = $array_game_photo[$games['id_game']];
	
$id_game = $games['id_game'];
	$gamesList .= <<<EOD
<div class="games">
	<a href="games.php?id_game={$id_game}">
		<img class="image_game" src="images/{$photo}" />
		<div class="name_game" rel="{$games['id_game']}">
			{$games['name_game']}
			<p class="description_short_game">{$games['description_short_game']}</p>
	</a>
	</div>
</div>
EOD;
}

?>

<div id="global_games">
<?php
echo $gamesList;
?>
</div>

<?php
closeBody();
?>
