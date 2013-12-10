<?php

function formFilter ($item, $type){

	$item = trim($item);
	if (strlen($item) < 3){
		echo "Error: ".$type." incorrecto";
		exit();
	}
	else if (preg_match("/'/", $item)){
		echo "Error: ".$type." incorrecto (caracteres prohibidos)";
		exit();
	}
	else if (preg_match("/\\\"/", $item)){
		echo "Error: ".$type." incorrecto (caracteres prohibidos)";
		exit();
	}
	
	return addslashes($item);
}

?>
