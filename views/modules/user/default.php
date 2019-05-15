<?php
defined('EXEC') or die;
?>
<div class="user">
	<div class="statusbar"><?php print ($main->session->user_statusbar != '' ? $main->session->user_statusbar : '<i>No status...</i>'); ?></div>
	<div class="avatar">
		<?php print ($main->session->user_avatar != '' ? '<img src="/files/avatars/'.$main->session->user_avatar .'">' : '<img src="/files/avatars/no.png">'); ?>
	</div>
	<div class="userInfo">
		<p class="username"><?php print $main->session->user_name; ?></p>
		<p class="username"><?php print $main->session->group_name; ?></p>
	</div>
	<div class="buttons">
		<a class="icon-off" href="/?task=logout&csrf=<?php print $csrf; ?>">Выйти</a>
	</div>
</div>