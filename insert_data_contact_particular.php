<?php

if(isset($_POST['first_name_particular']) && trim($_POST['first_name_particular']) != ''
		&& isset($_POST['localidad_particular']) && trim($_POST['localidad_particular']) != ''
		&& isset($_POST['mail_particular']) && trim($_POST['mail_particular']) != ''
		&& isset($_POST['comments_particular']) && trim($_POST['comments_particular']) != ''){
		
		$mail = $_POST['mail_particular'];
		$name = addslashes($_POST['first_name_particular']);
		$localidad = addslashes($_POST['localidad_particular']);
		$comments = addslashes($_POST['comments_particular']);
		$phone = (isset($_POST['telephone_particular'])) ? $_POST['telephone_particular'] : "no espec";
		
		$body = <<<EOD
Project-XYZ Web - Particular
Nom: {$name} 
Localidad: {$localidad}
Telefon: {$phone}
Comentari: {$comments}
EOD;
		
		$to = 'cristinaasalva@gmail.com';
		$subject = "Mail a traves de la web";
		$headers = 'From: webmaster@project-xyz.com' ."\r\n" . 'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $body, $headers);
	
	header ('Location: contact.php');
}
else {
		echo "Error, no ha introdu&iuml;t b&eacute; totes les dades";
	}

?>
