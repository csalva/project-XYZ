<?php

if(isset($_POST['first_name']) && trim($_POST['first_name']) != ''
		&& isset($_POST['localidad']) && trim($_POST['localidad']) != ''
		&& isset($_POST['mail']) && trim($_POST['mail']) != ''
		&& isset($_POST['comments']) && trim($_POST['comments']) != ''){
		
		$mail = $_POST['mail'];
		$name = addslashes($_POST['first_name']);
		$localidad = addslashes($_POST['localidad']);
		$comments = addslashes($_POST['comments']);
		$phone = (isset($_POST['telephone'])) ? $_POST['telephone'] : "no espec";
		
		$body = <<<EOD
Project XYZ Web - Profesional
Nom: {$name} 
Localidad: {$localidad}
Telefon: {$phone}
Comentari: {$comments}
EOD;
		
		$to = 'cristinaasalva@gmail.com';
		$subject = "Mail a traves de la web";
		$headers = 'From:  webmaster@project-xyz.com' ."\r\n" . 'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $body, $headers);
	
	header ('Location: contact.php');
}
else {
		echo "Error, no ha introdu&iuml;t b&eacute; totes les dades";
	}

?>
