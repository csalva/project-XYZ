<?php
session_start();
$growl = '';
if (isset($_SESSION['form_submit']) && $_SESSION['form_submit'] != ''){
	$growl = <<<EOD
$.gritter.add({
	// (string | mandatory) the heading of the notification
	title: 'Formulari Enviat',
	// (string | mandatory) the text inside the notification
	text: 'Intentarem contestar el m&eacute;s r&agrave;pid possible.',
	time : 100000
});
EOD;
$_SESSION['form_submit'] = '';
}


require_once('includes/template.php');
require_once('includes/connection.php');


$code = <<<EOD
$(document).ready(function(){
	$('h2').on('click', function(e){
		$(this).next().slideToggle();
	});
	
{$growl}
	$('#contacts').on('submit', function(e){
		if (!$('#checkbox').is(':checked')){
			alert('Confirme la acceptación de los datos');
			return false;
		}
		if ($('#first_name').val() == ''){
			$('#first_name').css('border','1px solid red');

			$('#first_name').attr('placeholder','Camp obligatori');
			return false;
		}
	
		if ($('#last_name').val() == ''){
			$('#last_name').css('border','1px solid red');

			$('#last_name').attr('placeholder','Camp obligatori');
			return false;
		}
	
		if ($('#mail').val() == ''){
			$('#mail').css('border','1px solid red');

			$('#mail').attr('placeholder','Camp obligatori');
			return false;
		}
	
		if ($('#comments').val() == ''){
			$('#comments').css('border','1px solid red');

			$('#comments').attr('placeholder','Camp obligatori');
			return false;
		}

	});

	$('#contacts_particular').on('submit', function(e){
		if (!$('#checkbox_particular').is(':checked')){
			alert('Confirme la acceptación de los datos');
			return false;
		}
		if ($('#first_name_particular').val() == ''){
			$('#first_name_particular').css('border','1px solid red');

			$('#first_name_particular').attr('placeholder','Camp obligatori');
			return false;
		}
	
		if ($('#localidad_particular').val() == ''){
			$('#localidad_particular').css('border','1px solid red');

			$('#localidad_particular').attr('placeholder','Camp obligatori');
			return false;
		}
	
		if ($('#mail_particular').val() == ''){
			$('#mail').css('border','1px solid red');

			$('#mail_particular').attr('placeholder','Camp obligatori');
			return false;
		}
	
		if ($('#comments_particular').val() == ''){
			$('#comments').css('border','1px solid red');

			$('#comments_particular').attr('placeholder','Camp obligatori');
			return false;
		}

	});
});
EOD;

openHeader('Project XYZ', 'styles/styles.css', $code);
openBody('Categorias disponibles','mainPage', $connection);

?>
<div id="global">
<h1>Contacta con Project XYZ</h1>

	<h2>Soy developer</h2>
	<div class="contacto">
	
		<form name="contacts" id="contacts" action="insert_data_contact.php" method="post">
		
		<label for="first_name" class="label">Nombre *</label>
		<div class="field_container"><input type="text" size="50" id="first_name" name="first_name"/></div><br/>
	
		<label for="localidad" class="label">Localidad *</label>
		<div class="field_container"><input type="text" size="50" id="localidad" name="localidad"/></div><br/>
	
		<label for="mail" class="label">E-mail *</label>
		<div class="field_container"><input type="text" size="50" id="mail" name="mail"/></div><br/>
	
		<label for="telephone" class="label">Tel&eacute;fono (opcional)</label>
		<div class="field_container"><input type="text" size="50" id="telephone" name="telephone"/></div><br/>
	
		<label for="comments" class="label">Comentario *</label><br/>
		<textarea rows="5" cols="39" id="comments" name="comments"></textarea><br/>
	
		<p><input type="checkbox" id="checkbox" name="checkbox" /> En cumplimiento con la Ley Org&aacute;nica 15/1999, de 13 de diciembre, de protecci&oacute;n de datos de car&aacute;cter personal (LOPD), le informamos que sus datos personales ser&aacute;n incluidos en un fichero automatizado con el fin de atender y dar curso a los comentarios, consultas y sugerencias que usted quiera trasladar a nuestra organizaci&oacute;n. Para ejercer los derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n y oposici&oacute;n previstos en la ley puede dirigirse a BlueRed, enviando un correo electr&oacute;nico a la direcci&oacute;n blueredbarcelona@gmail.com, indicando en el asunto del correo "Protecci&oacute;n de Datos".</p>
	
			<input type="submit" value="Enviar" />
			<input type="reset" value="Esborrar" />

		</form>
		<p>(*) Son campos obligatorios.</p>
	</div>
	
	<h2>Soy usuario</h2>
	<div class="contacto">
		<p>Si te gusta algo de lo que hacemos puedes ponerte en contacto por correo en info@project-xyz.com, te diremos la oficina m&aacute;s cercana a tu domicilio. Tambi&eacute;n puedes ponerte en contacto con nosotros rellenando el formulario que tienes m&aacute;s abajo.</p>
		<form name="contacts_particular" id="contacts_particular" action="insert_data_contact_particular.php" method="post">
		<input type="hidden" name="particular" value="false" />
	
		<label for="first_name" class="label">Nombre *</label>
		<div class="field_container"><input type="text" size="50" id="first_name_particular" name="first_name_particular"/></div><br/>
	
		<label for="localidad_particular" class="label">Localidad *</label>
		<div class="field_container"><input type="text" size="50" id="localidad_particular" name="localidad_particular"/></div><br/>
	
		<label for="mail_particular" class="label">E-mail *</label>
		<div class="field_container"><input type="text" size="50" id="mail_particular" name="mail_particular"/></div><br/>
	
		<label for="telephone_particular" class="label">Tel&eacute;fono (opcional)</label>
		<div class="field_container"><input type="text" size="50" id="telephone_particular" name="telephone_particular"/></div><br/>
	
		<label for="comments_particular" class="label">Comentario *</label><br/>
		<textarea rows="5" cols="39" id="comments_particular" name="comments_particular"></textarea><br/>
	
		<p><input type="checkbox" id="checkbox_particular" name="checkbox_particular" /> En cumplimiento con la Ley Org&aacute;nica 15/1999, de 13 de diciembre, de protecci&oacute;n de datos de car&aacute;cter personal (LOPD), le informamos que sus datos personales ser&aacute;n incluidos en un fichero automatizado con el fin de atender y dar curso a los comentarios, consultas y sugerencias que usted quiera trasladar a nuestra organizaci&oacute;n. Para ejercer los derechos de acceso, rectificaci&oacute;n, cancelaci&oacute;n y oposici&oacute;n previstos en la ley puede dirigirse a BlueRed, enviando un correo electr&oacute;nico a la direcci&oacute;n blueredbarcelona@gmail.com, indicando en el asunto del correo "Protecci&oacute;n de Datos".</p>
	
			<input type="submit" value="Enviar" />
			<input type="reset" value="Esborrar" />

		</form>
		<p>(*) Son campos obligatorios.</p>
	</div>
	
	<div id="text_contact">
	Estamos aqu&iacute;
	
	<iframe width="960" height="370" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=la+salle+gracia&amp;aq=&amp;sll=41.692248,1.745868&amp;sspn=2.280584,5.103149&amp;ie=UTF8&amp;hq=la+salle+gracia&amp;t=m&amp;cid=14910309269256412257&amp;hnear=&amp;ll=41.415569,2.157183&amp;spn=0.023816,0.041113&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.es/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=la+salle+gracia&amp;aq=&amp;sll=41.692248,1.745868&amp;sspn=2.280584,5.103149&amp;ie=UTF8&amp;hq=la+salle+gracia&amp;t=m&amp;cid=14910309269256412257&amp;hnear=&amp;ll=41.415569,2.157183&amp;spn=0.023816,0.041113&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>
	</div>

</div>
<?php
closeBody();
?>
