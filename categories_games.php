<?php
//require_once('includes/checksession.php');
require_once('includes/connection.php');
require_once('includes/template.php');
/*require_once('includes/func.getUserID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}*/

if (!isset($_GET['id_category']))
	exit();

$id_category = intval($_GET['id_category']);

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
FROM games g, categories c, categories_games cg
WHERE cg.id_category=c.id_category
AND c.id_category={$id_category}
AND cg.id_game=g.id_game
AND g.status=1
ORDER BY g.name_game
EOD;

$res = mysql_query($query,$connection);
$gamesList = '';
while ($games = mysql_fetch_assoc($res)){
$photo = $array_game_photo[$games['id_game']];
$id_game = $games['id_game'];
	$gamesList .= <<<EOD
<div class="gamescategories">
	<a href="games.php?id_game={$id_game}"><img class="image_game" src="images/{$photo}" />
	<div class="name_gamecategories" rel="{$games['id_game']}">
	{$games['name_game']}
	<p class="description_short_gamecategories">{$games['description_short_game']}</p>
	</a>
	</div>
</div>
EOD;
}
?>

<div id="global_games_categories">
<?php
echo $gamesList;
?>
</div>

<?php

closeBody();
?>
