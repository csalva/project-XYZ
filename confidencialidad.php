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

$code = <<<EOD
EOD;
openHeader('Project XYZ', '/project-xyz/styles/styles.css',$code);
openBody('Pol&iacute;tica de privacidad','mainPage', $connection);

?>
<div id="legal">

<p>En cumplimiento de la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal, le informamos que los datos personales que nos suministre a través del portal www.project-xyz.com, vía telefónica, o por correo electrónico serán tratados de forma confidencial y pasarán a formar parte de un fichero titularidad de Project XYZ, S.L. que ha sido debidamente inscrito en la Agencia Española de Protección de Datos (www.agpd.es). Sus datos personales serán utilizados para atender su petición de información, la gestión y prestación de los servicios ofrecidos por Project XYZ, y para el envío de futuras comunicaciones comerciales que pudieran ser de su interés.</p>

<p>Asimismo, le informamos que puede ejercitar sus derechos de acceso, rectificación, cancelación y oposición con arreglo a lo previsto en la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal, enviando una carta junto con la fotocopia de su DNI, a la siguiente dirección: Project XYZ S.L.U. REF: PROTECCION DE DATOS, C/ Desenga&ntilde;o 21, 28108, Madrid.</p>

<p>Los datos solicitados al Usuario mediante formularios indicados con un asterisco (*) serán los estrictamente necesarios para poder proporcionarle el servicio o para poder ponerse en contacto con el Usuario. En ningún caso, el hecho de no proporcionar más datos que los estrictamente necesarios supondrá una merma en la calidad del servicio.</p>

<p>El Usuario garantiza que los datos personales facilitados son veraces y se hace responsable de comunicar cualquier modificación en los mismos. 
<p>El Usuario será el único responsable de cualquier daño o perjuicio, directo o indirecto, que pudiera ocasionar a Project XYZ o a cualquier tercero, a causa de la cumplimentación de los formularios con datos falsos, inexactos, incompletos o no actualizados.</p>
<p>En el caso de que el Usuario incluya datos de carácter personal de terceros deberá, con carácter previo a su inclusión, informarles de lo establecido en la presente política de privacidad, siendo el único responsable de su inclusión.</p>

</div>
<?php
closeBody();
?>
