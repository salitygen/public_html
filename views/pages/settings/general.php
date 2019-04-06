<?php
defined('EXEC') or die;
Rules::settingsGeneral($main) or die('Access Denied');
$workshop = Workshop::get($main);
var_dump($workshop);
?>
<p>Информация о вашей компании</p>
