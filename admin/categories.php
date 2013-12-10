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

	$('#categories').hide();
	$('#addcategory').on('click', function(e){
  	$('#categories').show('slow');
  });

	$('#categories').on('submit', function(e){
		if ($('#name_category').data('border_css') == undefined)
			$('#name_category').data('border_css', $('#name_category').css('border'));
		
		var error = false;
		if ($('#name_category').val() == ''){
			
			$('#name_category').css('border','1px solid red');

			$('#name_category').attr('placeholder','Campo obligatorio');
			error = true;
		}
	});
	
	$('#categoriesList .remove').on('click', function(e){
	var tr_parent = $(this).parents('tr:first');
	var id_category = $(tr_parent).attr('rel');

	$.get('remove.category.php?id_category='+id_category, function(data){
		if (data == 'OK'){
			$('td', tr_parent).slideUp('slow', function(){
				$(tr_parent).remove();
			});

			return;
		}

		alert('Error al eliminar la categoria');
	});
});

function sendModifyCategoryForm(parent){
	var form = $('#modifyCategoryForm');
	$.post('modify.category.php', $(form).serialize(), function(data){
	
		var name_category = $('#name_category').val();
		$('td:first', parent).html(name_category);
		
		$('#categoryDialog').dialog('close');
	});
}

$('#categoriesList .modify').on('click', function(e){
	var tr_parent = $(this).parents('tr:first');
	var id_category = $(tr_parent).attr('rel');
	var name_category = $('.name_category', tr_parent).text();

	if ($('#studentDialog').length > 0)
		$('#studentDialog').remove();
		
	var dialog = '<div id="categoryDialog" title="Modificar categoria">';
	dialog += '<form action="modify.category.php" method="post" id="modifyCategoryForm">';
	dialog += '<input type="hidden" name="id_category" id="id_category" value="'+id_category+'" />';
	dialog += '<p><label for="name_category">Categoria</label>';
	dialog += '<input type="text" name="name_category" id="name_category" value="'+name_category+'" /></p>';
	dialog += '</form></div>';

	$('body').append(dialog);

	$("#categoryDialog:ui-dialog").dialog( "destroy" );
	
	$("#categoryDialog").dialog({
		height: 280,
		modal: true,
		buttons:{
			"Modificar": function(){
				sendModifyCategoryForm(tr_parent);
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
FROM categories
WHERE status=1
ORDER BY name_category
EOD;

$res = mysql_query($query, $connection);
$categoryList = '';
while ($category = mysql_fetch_assoc($res)){
	$categoryList .= <<<EOD
<tr rel="{$category['id_category']}">
<td class="name">{$category['name_category']}</td>
<td class="options">
	<span class="remove ui-icon ui-icon-trash" title="Eliminar categoria"></span>
	<span class="modify ui-icon ui-icon-pencil" title="Editar la informaci&oacute; de la categoria "></span>
</td>
</tr>
EOD;
}

$categories = <<<EOD
<div id="categoriesList">
<h3>Categories</h3>
<table>
{$categoryList}
</table>
<input type="button" name="addcategory" id="addcategory" value="Afegir categoria" />
</div>
EOD;

echo $categories;
?>
	<form name="categories" id="categories" action="insert_admin_categories.php" method="post">
	<ul>
		<li><label for="name_category" class="label_form">Nom categoria</label>
			<input type="text" name="name_category" id="name_category" class="input" minlength="2" size="10"/>
		</li>
	</ul>
	<input type="submit" value="Guardar"/>
	</form>
<?php
closeBody();
?>
