<?php 
session_start();
$_SESSION['login'] = '';
session_destroy();

header('Location: admin/index.php');
exit();
?>
