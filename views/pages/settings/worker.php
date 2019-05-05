<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workerGroups = Workers::Groups::get();
$workerUsers = Workers::Users::get();

var_dump($workerGroups);
var_dump($workerUsers);
?>

<p>Сотрудники</p>