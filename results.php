<?php
function datos($datos)
{
?>
<div class="results">
	<p>
	<h3><?php echo $datos['name_game']; ?></h3><?php echo $datos['description_game']; ?></p>
	<p>&Uacute;ltima actualizaci&oacute;n <?php echo $datos['update']; ?><a href="games.php?id_game=<?php echo $datos['id_game'];?>"> para m&aacute;s informaci&oacute;n </a>
	</p>
</div>
<?php
}

require_once('includes/connection.php');

$query = <<<EOD
SELECT *
FROM games
WHERE status=1
EOD;

if (isset($_POST['name_category']) && intval($_POST['name_category']) != 0){
	$query .= ' AND name_category='.intval($_POST['name_category']);
}

if (isset($_POST['name_game']) && intval($_POST['name_game']) != 0){
	$query .= ' AND name_game='.intval($_POST['name_game']);
}

$result = mysql_query($query,$connection) or die (mysql_error());

if (mysql_num_rows($result) == 0)
	echo "<p>No hay coincidencias... otras opciones:</p>";

$query = <<<EOD
SELECT *
FROM games
WHERE status=1
EOD;

if (isset($_POST['name_category']) && trim($_POST['name_category']) != ''){
	$query .= ' AND (name_category >= '.trim($_POST['name_category']);
	
	$query .= ')';		
}
else if (isset($_POST['name_category']) && trim($_POST['name_category']) != ''){
	$query .= ' AND name_category <= '.trim($_POST['name_category']);
}


$result = mysql_query($query,$connection) or die (mysql_error());

?>

<div id="content_results">
<?php
while ($fila = mysql_fetch_assoc($result)){
	datos($fila);
}
?>
</div>
