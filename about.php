<?php
//require_once('includes/checksession.php');
require_once('includes/connection.php');
require_once('includes/template.php');
/*require_once('includes/func.getUserID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}
*/
$code = <<<EOD

EOD;

openHeader('Project XYZ', '/project-xyz/styles/styles.css', $code);
openBody('Acerca de Project XYZ','mainPage', $connection);

?>
<div class="about">
	<h2>Acceso instantáneo a juegos</h2>
	<p>Desde juegos de acción hasta juegos independientes, y todo lo que hay por el medio. Disfruta de ofertas exclusivas, actualizaciones automáticas y otras magníficas ventajas.</p>
	<p><a href="search.php" class="search">Buscar juegos </a><span class="ui-icon ui-icon-search"></span></p>
</div>

<div class="about">
	<h2>&Uacute;nete a la Comunidad</h2>
	<p>Conoce gente, &uacute;nete a grupos, forma clanes, chatea mientras juegas... la diversión nunca se acaba!
	2,851,508 jugadores conectados
	342,265 jugando</p>
	<p><a href="register.php">Unirse a la Comunidad</a>
</div>

<div class="about">
	<h2>Entretenimiento en cualquier lugar</h2>
	<p>Ya sea en un PC, Mac, dispositivo m&oacute;vil, puedes disfrutar de las ventajas de XYZ. No importa donde est&eacute;s, ll&eacute;vate la diversi&oacute;n contigo.</p>
</div>
<?php
closeBody();
?>
