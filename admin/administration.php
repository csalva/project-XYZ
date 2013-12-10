<?php
require_once('checksessionAdmin.php');
require_once('../includes/connection.php');
require_once('../includes/func.getAdminID.php');
$id_user = getUserID($connection);
if (!$id_user){
	echo 'Error: login';
	exit();
}

require_once('../includes/func.buildLogoutAdmin.php');
$logout = buildLogoutAdmin($connection, $id_user);
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
FROM games g, admins a
WHERE g.status=1
AND g.id_parent_game = 0
AND g.id_admin={$id_user}
AND g.id_admin=a.id_admin
EOD;

$res = mysql_query($query, $connection);
$gamesList = '';
while ($game = mysql_fetch_assoc($res)){
	$gamesList .= <<<EOD
<tr rel="{$game['id_game']}">
<td class="name">{$game['name_game']}</td>
<td>
	<div class="gameInfo">
	<span class="description">{$game['description_game']}</span>
	</div>
</td>
<td class="options">
	<span class="remove ui-icon ui-icon-trash" title="Eliminar game"></span>
	<span class="modify ui-icon ui-icon-pencil" title="Editar la informaci&oacute; del game "></span>
</td>
</tr>
EOD;
}

$articles = <<<EOD
<div id="gamesList">
<h3>games</h3>
<table>
{$gamesList}
</table>
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

?>

<div id="form_admin_game">
			<form name="games" id="games" action="insert_admin_games.php" method="post">
			<ul>
				<li><label for="category">Categoria</label> 
					<select name="category_name" id="category_name">
						<option value="0">Selecciona una categoria...</option>
						<?php echo $category_list; ?>
					</select>
				</li>
				<li><label for="name_game" class="label_form">Nom game</label>
					<input type="text" name="name_game" id="name_game" class="input" minlength="2" size="10"/></li>

				<li><label for="description_game" class="label_form">Descripci&oacute; game</label>
					<input type="text" id="description_game" name="description_game" class="input" size="10" /></li>

			</ul>
			<input type="submit" value="Guardar"/>
			</form>
</div>
<?php
closeBody();
?>
