<?php
require_once('includes/checksession.php');
require_once('includes/connection.php');
require_once('includes/template.php');
require_once('includes/func.getUserID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

$code = <<<EOD
var image_num = 0;
var num_images = 0;

function moveImages (){
	var lista = $('#imageListDonation');
	
	var pos = $(lista).position()
	lista.animate({'left':pos['left'] - 960}, 2000, function(e){
		$('li:first',this).appendTo(this);
		$(this).css('left',0);
		image_num++;
		
		$('#imagePagesDonation li').removeClass('active');
		$('#imagePagesDonation li:eq('+(image_num % num_images)+')').addClass('active');
	});
}

$(document).ready(function(){
	num_images = $('#imageListDonation li').length;
	var ul_width = num_images * 960;
	
	$('#imageListDonation').css('width', ul_width);
	
	$('#imagesDonation').append('<ul id="imagePagesDonation"></ul>');
	
	$('#imagesDonation #imageListDonation li').each(function(i){
		var img = $('img', this);
		
		var texto = '<div class="bgInfo"></div><div class="imgInfo"><p><strong>'+$(img).attr('title')+'</strong><br />'+$(img).attr('alt')+'</p></div>';
		$(this).append(texto);
		
		var class_act = '';
		if (i == 0){
			class_act = ' class="active"';
		}

		$('#imagePagesDonation').append('<li'+class_act+'><a href="#'+i+'"><span>'+(i+1)+'</span></a></li>');
	});
	
	setInterval('moveImages()', 4000);

	//Donaciones
	$('.nameGamesDonation').on('click', function(e){
		var id = $(this).attr('rel');
		$('.descriptionGamesDonation'+id).append('<div class="form_donation"><form class="form_donation_send" action="insert_data_donation.php" method="post"><input type="hidden" name="id_game" value="'+id+'" /><input type="hidden" name="id_user" value="{$id_user['id_user']}" /><input type="text" name="valor_donacion" placeholder="Inserta una cantidad"/><input type="submit" name="donar" value="Donar" /></form></div>')
	
	$('.form_donation_send').on('submit', function(e){
		e.preventDefault();
		var id_game = $('input[name=id_game]',this).val();
		var id_user = $('input[name=id_user]',this).val();
		var valor_donacion = $('input[name=valor_donacion]').val();
		
		$.post("insert_data_donation.php", { id_game: id_game, id_user: id_user, valor_donacion: valor_donacion }, function(data){
			if(data=='KO'){
				alert('Error');
			}else{		
$.gritter.add({
	// (string | mandatory) the heading of the notification
	title: 'Donacion realizada',
	// (string | mandatory) the text inside the notification
	text: 'Puede volver hacer una donacion en un futuro, si usted quiere',
	time : 100000
});
			}
		});
	});
	
		$(this).off('click');
			$(this).on('click', function(e){
				$('.nameGamesDonation .descriptionGamesDonation').submit();		
			});
	});	
});
EOD;

openHeader('Project XYZ', '/project-xyz/styles/styles.css',$code);
openBody('Donaciones','mainPage', $connection);

?>

<div id="imagesDonation">
<ul id="imageListDonation">
<li><img src="donations/ajedrez.jpg" title="Ajedrez" alt="Un juego competitivo entre dos personas. Haz una donación para poder optimizar el juego." /></li>
<li><img src="donations/ahorcado.jpg" title="Ahorcado" alt="Ahorcado" /></li>
<li><img src="donations/aventuras.jpg" title="Aventuras" alt="Aventuras" /></li>
</ul>

</div>

<?php

$query = <<<EOD
SELECT *
FROM games
WHERE status = 1
AND id_parent_game = 0
ORDER BY name_game
EOD;

$res = mysql_query($query,$connection);
$gamesListDonation = '';
while ($gamesDonation = mysql_fetch_assoc($res)){
	$gamesListDonation .= <<<EOD
<div class="gamesDonation">
	<div class="nameGamesDonation" rel="{$gamesDonation['id_game']}">
		<span class="heart  ui-icon ui-icon-heart" rel="{$gamesDonation['id_game']}"></span>{$gamesDonation['name_game']}
		<p class="descriptionGamesDonation{$gamesDonation['id_game']}">{$gamesDonation['description_short_game']}</p>
	</div>
</div>
EOD;
}

?>

<div id="globalGamesDonation">
<?php
echo $gamesListDonation;
?>
</div>

<?php
closeBody();
?>
