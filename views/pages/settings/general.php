<?php
defined('EXEC') or die;
if(!$main->session->group_super_users or !$main->session->settings_general) die ('Access Denied');

var_dump($main);
?>
<p>Информация о вашей компании</p>
