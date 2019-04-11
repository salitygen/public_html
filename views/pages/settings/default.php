<?php
defined('EXEC') or die;
Rules::seeSettings($main) or die('Access Denied');
?>
<h1>Настройки системы</h1>
<?php print Render::view($main,false,false); ?>