<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();

var_dump($workerGroups);
var_dump($workerUsers);
?>

<p>Сотрудники</p>