<?php
defined('EXEC') or die;
Rules::settingsGeneral($main) or die('Access Denied');
$this->workshop = Workshop::get($main);
var_dump($this);
?>
<p>Информация о вашей компании</p>
