<?php
defined('EXEC') or die;
Rules::settingsGeneral($main) or die('Access Denied');
$ws = new stdClass;

$ws->data = Workshop::get($main->session->user_workshops_id);
$ws->addres = Addres::get($ws->data->workshop_addres_id);
var_dump($ws);
var_dump($main);
?>
<p>Информация о вашей компании</p>
