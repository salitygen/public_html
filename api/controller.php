<?php
defined('EXEC') or die;
include $main->root.'/api/methods/main.php';

$task = checkInput::strip($_GET['task']);

$arr = checkUser::dataBase($_POST);

?>