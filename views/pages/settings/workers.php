<?php
defined('EXEC') or die;
Rules::settingsWorkers($main) or die('Access Denied');
$workers = Workers::getAll();
var_dump($workers);
?>
<p>Сотрудники</p>
<?php if($mess = SystemMessage::get($main)) print $mess; ?>