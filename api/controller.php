<?php
defined('EXEC') or die;
include $main->root.'/api/methods/main.php';

$task = checkInput::strip($GET['task']);
print $task;

?>