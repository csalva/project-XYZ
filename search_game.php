<?php
require_once ('includes/template.php');

$code = <<<EOD

EOD;

openHeader('Project XYZ', '/project-xyz/styles/styles.css', $code);
openBody('');
?>

<div id="form_connect">
<?php
require_once ('results.php');
?>
</div>

<?php
closeBody();
?>
