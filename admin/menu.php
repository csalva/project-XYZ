<?php
$menu = array('categories.php' => '<span title="Edición de categorias">Categorias</span>','');

echo '<ul id="mainMenu">';
foreach ($menu as $url => $name){
	echo '<li><a href="'.$url.'">'.$name.'</a></li>';
}
echo '</ul>';
?>
