<?php
defined('EXEC') or die;
include $main->root.'/api/methods/main.php';

if(isset($_GET['task'])){
	$task = checkInput::strip($_GET['task']);
	if($task == 'login'){
		$arr = checkUser::dataBase($_POST,$db);
	}
}

?>