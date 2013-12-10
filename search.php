<?php
require_once('includes/connection.php');
require_once('includes/template.php');

$query = <<<EOD
SELECT *
FROM categories
ORDER BY name_category
EOD;

$res = mysql_query($query);

$categories_list = '';
while ($categories = mysql_fetch_assoc($res)){
	$categories_list .= <<<EOD
<option value="{$categories['id_category']}">{$categories['name_category']}</option>
EOD;
}

$categories_list = addslashes($categories_list);

$code = <<<EOD

EOD;

openHeader('Project XYZ', '/project-xyz/styles/styles.css', $code);
openBody('Buscador de juegos','mainPage', $connection);
?>

<div id="search">
	<form id="form_search" action="insert_data_search.php" method="post">
	
	<label for="name_category">Categoria</label>
	<select id="name_category" name="name_category">
		<option value="0">---Selecciona---</option>
		<?php echo $categories_list; ?>
	</select>
	<br/>
	<label for="name_game">Nombre del juego</label>
	<input id="name_game" name="name_game" value="" />
	
	<input type="submit" id="submit" name="buscar" value="buscar" />
	</form>
</div>

<?php

closeBody();
?>
