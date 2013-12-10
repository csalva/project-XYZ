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
	$('#photoList .remove').on('click', function(e){
			var li_parent = $(this).parents('li:first');
			var id_photo = $(li_parent).attr('rel');

			$.get('remove.photo.php?id_photo='+id_photo, function(data){
				if (data == 'OK'){
					$(li_parent).slideUp('slow', function(){
						$(li_parent).remove();
					});

					return;
				}

				alert('Error al eliminar la photo');
			});
		});
});
EOD;

openHeader('Project XYZ', '../styles/stylesAdmin.css', $code);
openBody('Project XYZ: Administració','adminBody');

echo $logout;
require_once('menu.php');
?>

<div id="logo"><img src="../images/xyz_logo.png" /></div>

<?php
$query = <<<EOD
SELECT *
FROM photos
ORDER BY name_photo
EOD;

$res = mysql_query($query);

$photo_list = '';
while ($photo = mysql_fetch_assoc($res)){
	$photo_list .= <<<EOD
<div class="photo_game">
<li class="photo_options" rel="{$photo['id_photo']}">
	<img src="../images/{$photo['name_photo']}" />
		<span class="remove ui-icon ui-icon-trash" title="Eliminar foto"></span>
</li>
</div>
EOD;
}

$photo = <<<EOD
<div id="photoList">
<h3>Fotos</h3>
<form action="upload.photo.php" method="post" enctype="multipart/form-data">
	<input name="file" type="file" />
	<input name="submit" type="submit" value="Subir" />
</form>
{$photo_list}
</div>
EOD;

echo $photo;
closeBody();
?>
