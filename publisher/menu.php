<?php
$menu = array('administration.php' => '<span title="Edición de juegos">Juegos</span>','photos.php' => '<span title="photos">Fotos</span>');

echo '<ul id="mainMenu">';
foreach ($menu as $url => $name){
	echo '<li><a href="'.$url.'">'.$name.'</a></li>';
}
echo '</ul>';
?>
