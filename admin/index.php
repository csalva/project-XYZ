<?php
if (!isset($connection))
	require_once('../includes/connection.php');
	
$code = <<<EOD
function validateEmail(email) { 
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,4}))$/;

	return re.test(email);
} 

$(document).ready(function(){
	$('#login').on('click', function(e){
			e.preventDefault()
	
		 var email = $('#login_name').val();
		 
		 	if (!validateEmail(email)){
				alert('mail incorrecto');
				$('#login_name').focus();
				return false;
			}
		
			var password = $('#login_password').val();
		
				if (password.length<5){
					alert('password incorrecto');
					$('#login_password').focus();
					return false;
				}
			$('#form_login').submit();
		});
});
EOD;

require_once ('../includes/templateAdmin.php');
openHeader('Project XYZ', '../styles/stylesAdmin.css', $code);
openBody('');
?>
		<div id="Front">
			<p id="FrontLogo"><img src="../images/xyz_logo.png" alt="XYZ" /></p>
			<div id="AccessAdmin">
				<h2>Acc&eacute;s a l'administraci&oacute;</h2>
				<form name="form_login" id="form_login" method="post" action="checkloginAdmin.php">
					<label for="login">Login</label> 
					<input type="text" id="login_name" name="login_name"  placeholder="e-mail" /> 
					<label for="login_password">Password</label> 
					<input type="password" id="login_password" name="login_password" placeholder="Password" />
					<input type="submit" name="login" id="login" value="Entrar" />
				</form>
			</div>		
		</div>	
<?php
closeBody();
?>
