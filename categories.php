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

openHeader('Project XYZ', '/project-xyz/styles/styles.css');
openBody('Categorias disponibles','mainPage', $connection);

$query = <<<EOD
SELECT *
FROM categories_photos cp, photos p
WHERE p.id_photo=cp.id_photo
AND p.status_photo=1
ORDER BY cp.id_category_photo ASC
EOD;

if(!($res = mysql_query($query, $connection))){
	echo 'KO';
	exit();
}

$array_cat_photo = array();

while ($file = mysql_fetch_assoc($res)){
	
$array_cat_photo[$file['id_category']] = $file['name_photo'];
}


$query = <<<EOD
SELECT *
FROM categories
WHERE status = 1
ORDER BY name_category
EOD;

$res = mysql_query($query,$connection);
$categoryList = '';
while ($category = mysql_fetch_assoc($res)){
$photo = $array_cat_photo[$category['id_category']];
$id_category = $category['id_category'];
	$categoryList .= <<<EOD
<div class="category">
	<a href="categories_games.php?id_category={$id_category}"><img class="image_category" src="images/{$photo}" /><p class="name_category" rel="{$category['id_category']}">{$category['name_category']}</p></a>
</div>
EOD;
}
?>

<div id="global_category">
<?php
echo $categoryList;
?>
</div>

<?php
closeBody();
?>
