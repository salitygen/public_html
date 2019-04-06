<?php
defined('EXEC') or die;
Rules::settingsGeneral($main) or die('Access Denied');
$ws = new workshop;
$ws->data = Workshop::get($main);
$ws->addres = Addres::get($ws->data->workshop_addres_id);
var_dump($ws);
?>
<p>Информация о вашей компании</p>
