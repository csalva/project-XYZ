<?php
function openHeader ($title = '', $style = '', $script = '') {

	if ($title != ''){
		$title = '<title>'.$title.'</title>';
	}
	if ($style != ''){
		$style = '<link href="'.$style.'" rel="stylesheet" type="text/css" />';
	}
	if ($script != ''){
		$script = '<script>'.$script.'</script>';
	}

	echo <<<EOD
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
{$title}
{$style}
<link href="/project-xyz/styles/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="/project-xyz/styles/redmond/jquery-ui-1.8.22.custom.css" rel="stylesheet" type="text/css"/>
<script src="/project-xyz/js/jquery-1.8.2.js"></script>
<script src="/project-xyz/js/jquery-ui.css"></script>
<script src="/project-xyz/js/jquery-ui.js"></script>
<script src="/project-xyz/js/jquery.validate.min.js"></script>
<script src="/project-xyz/js/jquery.gritter.min.js"></script>
{$script}
<script>
$(document).ready(function(){
	$('#login_sesion').on('click', function(e){
		$('#login_sesion').append('<div id="form_login"><form action="includes/checklogin.php" method="post"><input type="text" id="mail_user" name="mail_user" placeholder="Correo electr&oacute;nico"/><input type="password" id="password_user" name="password_user" placeholder="Contrase&ntilde;a"/><input type="submit" id="connection" name="connection" value="Iniciar sesi&oacute;n" /><p><a href="../project-xyz/register.php">Crear una cuenta</a></p></form></div>')

		$('#login_sesion').off('click');
		$(this).on('click', function(e){
			$('#login_sesion').submit();		
		});
	});

});
</script>
</head>
EOD;
}

function openBody ($title = '', $id = '', $connection = false) {
	if ($title != ''){
		$title = '<h1>'.$title.'</h1>';
	}
	if ($id != ''){
		$id = ' id="'.$id.'"';
	}
	
	$login = '';
	if ($connection){
		require_once('func.buildLogout.php');
		$login = buildLogout ($connection);
	}
	echo <<<EOD
<body{$id}>
	<div id="layout">
		<div id="global_header">
			<div class="content">
				<div class="logo">
					<a href="index.php">PROJECT XYZ</a>
				</div>
				<div id="menu">
					<a href="index.php"><li class="menuitem1">GAMES</li></a>
					<a href="categories.php"><li class="menuitem2">CATEGORIES</li></a>
					<a href="donations.php"><li class="menuitem3">DONATIONS</li></a>
					<a href="about.php"><li class="menuitem4">ABOUT</li></a>
				</div>
				<div id="global_action">
					{$login}
				</div>
			</div>
		</div>
		<div id="container">
			{$title}
EOD;
}

function closeBody ($info = 'Project XYZ - La Salle Gracia 2012 - Cristina Salv&agrave; Borja &copy; <br>Todos los derechos reservados. Todas las marcas registradas son propiedad de sus respectivos dueños en respectivos pa&iacute;ses.'){
	echo <<<EOD
		</div>
		</div>
		<div id="footer">
			<p>{$info}</p>
			<div class="LOPD">
			<a href="confidencialidad.php">Política de confidencialidad</a> | 
			<a href="legal.php">Información legal</a> | <a href="contact.php">Contacto</a>
			</div>
		</div>
</body>
</html>
EOD;
}
?>
