<?php
defined('EXEC') or die;
if($mess = SystemMessage::get($main)) print $mess;
print 'Not Found';
?>