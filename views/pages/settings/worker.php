<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::getGroups();
$workerUsers = Workers::getUsers();

print HTML::Name($main,'groups','GROUP_ID0');
//var_dump($main);
var_dump($workerGroups);
var_dump($workerUsers);
?>

<p>Сотрудники</p>