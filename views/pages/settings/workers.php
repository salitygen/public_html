<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$users = Users::get();
?>
<p>Сотрудники</p>