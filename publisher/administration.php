<?php
require_once('checksessionPublisher.php');
require_once('../includes/connection.php');
require_once('../includes/func.getPublisherID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

require_once('../includes/func.buildLogoutPublisher.php');
$logout = buildLogoutPublisher($connection, $id_user);
require_once ('../includes/templateAdmin.php');

$code = <<<EOD
$(document).ready(function() {

	$('#games').hide();
		$('#addgame').on('click', function(e){
			$('#games').show('slow');
		});
	
		$('#games').on('submit', function(e){
		
			if ($('#name_game').val() == ''){
				$('#name_game').css('border','1px solid red');

				$('#name_game').attr('placeholder','Campo obligatorio');
				error = true;
			}
		
			if ($('#description_game').val() == ''){
				$('#description_game').css('border','1px solid red');

				$('#description_game').attr('placeholder','Campo obligatorio');
				error = true;
			}
		
			if (error)
				return false;
		});
	
		$('#gamesList .remove').on('click', function(e){
		var tr_parent = $(this).parents('tr:first');
		var id_game = $(tr_parent).attr('rel');

		$.get('remove.game.php?id_game='+id_game, function(data){
			if (data == 'OK'){
				$('td', tr_parent).slideUp('slow', function(){
					$(tr_parent).remove();
				});

				return;
			}

			alert('Error al eliminar el game');
		});
	});

function sendModifyGamesForm(parent){
	var form = $('#modifyGamesForm');
	$.post('modify.game.php', $(form).serialize(), function(data){
	
		var name_game = $('#name_game').val();
		var description_game = $('#description_game').val();
		$('td:first', parent).html(name_game);
		$('.description_game',parent).text(description_game);
		
		$('#gameDialog').dialog('close');
	});
}

	$('#gamesList .modify').on('click', function(e){
		var tr_parent = $(this).parents('tr:first');
		var id_game = $(tr_parent).attr('rel');
		var name_game = $('.name_game', tr_parent).text();
		var description_game = $('.description_game', tr_parent).text();

		if ($('#gameDialog').length > 0)
			$('#gameDialog').remove();
		
		var dialog = '<div id="gameDialog" title="Modificar game">';
		dialog += '<form action="modify.game.php" method="post" id="modifyGamesForm">';
		dialog += '<input type="hidden" name="id_game" id="id_game" value="'+id_game+'" />';
		dialog += '<p><label for="name_game">Nom game</label>';
		dialog += '<input type="text" name="name_game" id="name_game" value="'+name_game+'" /></p>';
		dialog += '<p><label for="description_game">Descripcio&oacute; game</label>';
		dialog += '<input type="text" name="description_game" id="description_game" value="'+description_game+'"  /></p>';
		dialog += '</form></div>';

		$('body').append(dialog);

		$("#gameDialog:ui-dialog").dialog( "destroy" );
	
		$("#gameDialog").dialog({
			height: 280,
			modal: true,
			buttons:{
				"Modificar": function(){
					sendModifyGamesForm(tr_parent);
				},
				"Cancelar": function(){
					$(this).dialog("close");
				}
			}
		});
	});
});
EOD;

openHeader('Project XYZ', '../styles/stylesAdmin.css', $code);
openBody('Project XYZ: Administració','adminBody');

echo $logout;
require_once('menu.php');

$query = <<<EOD
SELECT *
FROM games g, publishers_games pg
WHERE pg.id_publisher={$id_user}
AND pg.id_game = g.id_game
AND g.id_parent_game = 0
AND g.status=1
EOD;

$res = mysql_query($query, $connection);
$gamesList = '';
while ($game = mysql_fetch_assoc($res)){
	$gamesList .= <<<EOD
<ul class="list_game">
	<li rel="{$game['id_game']}">
	<li class="name">{$game['name_game']}</li>
	<li class="description">{$game['description_game']}</li>
	<li class="options">
		<span class="remove ui-icon ui-icon-trash" title="Eliminar game"></span>
		<span class="modify ui-icon ui-icon-pencil" title="Editar la informaci&oacute; del game "></span>
	</li>
	</li>
</ul>
EOD;
}
?>
<div id="logo"><img src="../images/xyz_logo.png" /></div>
<?php
$articles = <<<EOD
<div id="gamesList">
<h3>Juegos</h3>
{$gamesList}
<input type="button" name="addgame" id="addgame" value="Afegir game" />
</div>
EOD;

echo $articles;

$query = <<<EOD
SELECT *
FROM categories
ORDER BY name_category
EOD;

$res = mysql_query($query);

$category_list = '';
while ($category = mysql_fetch_assoc($res)){
	$category_list .= <<<EOD
<option value="{$category['id_category']}">{$category['name_category']}</option>
EOD;
}

$query = <<<EOD
SELECT *
FROM photos
ORDER BY name_photo
EOD;

$res = mysql_query($query);

$photo_list = '';
while ($photo = mysql_fetch_assoc($res)){
	$photo_list .= <<<EOD
<option value="{$photo['id_photo']}">{$photo['name_photo']}</option>
EOD;
}

?>

<div id="form_admin_game">
			<form name="games" id="games" action="insert_admin_games.php" method="post">
			<ul>
				<li>
					<label for="category">Categoria</label> 
					<select name="id_category" id="id_category">
						<option value="0">Selecciona una categoria...</option>
						<?php echo $category_list; ?>
					</select>
				</li>
				<li><label for="photo">Foto</label> 
					<select name="id_photo" id="id_photo">
						<option value="0">Selecciona una foto...</option>
						<?php echo $photo_list; ?>
					</select>
				</li>
				<li>
					<label for="name_game" class="label_form">Nombre del juego</label>
					<input type="text" name="name_game" id="name_game" class="input" minlength="2" size="10"/>
				</li>
				<li>
					<label for="description_game" class="label_form">Descripci&oacute;n del juego</label>
					<textarea id="description_game" name="description_game" cols="50" rows="5">
					</textarea>
				</li>
				<li>
					<label for="description_short_game" class="label_form">Descripci&oacute;n corta del juego</label>
					<textarea id="description_short_game" name="description_short_game" cols="50" rows="3">
					</textarea>
				</li>
				<li>
					<label for="version_game" class="label_form">Versi&oacute;n del juego</label>
					<input type="text" name="version_game" id="version_game" class="input" minlength="2" size="10"/>
				</li>
				<li>
					<label for="size_game" class="label_form">Tama&ntilde;o del juego</label>
					<input type="text" name="size_game" id="size_game" class="input" minlength="2" size="10"/>
				</li>
			</ul>
			<input type="submit" id="guardar_game" value="Guardar"/>
			</form>
</div>
<?php
closeBody();
?>
