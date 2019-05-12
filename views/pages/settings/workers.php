<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workers = Workers::get();
var_dump($workers);
?>
<p>Сотрудники</p>