<?php
defined('EXEC') or die;
Rules::settingsUsers($main) or die('Access Denied'); // Изменить на settingsUsers()
$users = Users::get();
?>