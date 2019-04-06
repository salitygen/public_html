<?php
defined('EXEC') or die;
Rules::settingsGeneral($main) or die('Access Denied');

//Start info collection
$ws = Workshop::get($main->session->user_workshops_id);
$ws->addres = Addres::get($ws->workshop_addres_id);
$ws->mails = Mails::get($ws->workshop_mail_id);
$ws->phones = Phone::get($ws->workshop_phone_id);
//End info collection

var_dump($ws);

?>
<p>Информация о вашей компании</p>
