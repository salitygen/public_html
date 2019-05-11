<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workers = Workers::get();
?>
<p>Сотрудники</p>