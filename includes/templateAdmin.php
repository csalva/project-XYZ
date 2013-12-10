<?php
require_once('connection.php');

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

<link href="../styles/jquery.gritter.css" rel="stylesheet" type="text/css" />
<link href="/project-xyz/styles/redmond/jquery-ui-1.8.22.custom.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/jquery.gritter.min.js"></script>
<script type="text/javascript" src="../js/jquery.tinymce.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
{$script}
</head>
EOD;
}

function openBody ($title = '') {
	if ($title != ''){
		$title = '<h1>'.$title.'</h1>';
	}
	
	echo <<<EOD
<body>
<div id="layout">
	<div id="container">
EOD;
}

function closeBody ($info = ''){
	echo <<<EOD
	</div>
</div>
</body>
</html>
EOD;
}
?>
