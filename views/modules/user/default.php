<?php
defined('EXEC') or die;
?>
<div class="user">
	<div class="statusbar"><?php print $main->session->user_statusbar; ?></div>
	<div class="avatar">
		<img src="/files/avatars/<?php print $main->session->user_avatar; ?>">
	</div>
	<div class="userInfo">
		<p class="username"><?php print $main->session->user_name; ?></p>
		<p class="username"><?php print $main->session->group_name; ?></p>
	</div>
	<div class="buttons">
		<a class="icon-off" href="/?task=logout">Выйти</a>
	</div>
</div>