<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied'); // Изменить на settingsUsers()
$users = Users::get();
?>