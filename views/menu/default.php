<?php
defined('EXEC') or die;
?>
<div class="menu">
	<ul>
		<li><a class="icon-gauge <?php if($main->view == 'dashboard') print 'active';?>" href="/?view=dashboard">Показатели</a></li>
		<li><a class="icon-th <?php if($main->view == 'order') print 'active';?>" href="/?view=order">Заказы</a></li>
		<li><a class="icon-clock <?php if($main->view == 'task') print 'active';?>" href="/?view=task">Задачи</a></li>
		<li><a class="icon-rouble <?php if($main->view == 'payment') print 'active';?>" href="/?view=payment">Платежи</a></li>
		<li><a class="icon-users <?php if($main->view == 'contractor') print 'active';?>" href="/?view=contractor">Контрагенты</a></li>
		<li><a class="icon-cubes <?php if($main->view == 'storage') print 'active';?>" href="/?view=storage">Склад</a></li>
		<li><a class="icon-chart-area <?php if($main->view == 'reports') print 'active';?>" href="/?view=reports">Отчеты</a></li>
		<li><a class="icon-sliders <?php if($main->view == 'settings') print 'active';?>" href="/?view=settings">Настройки</a></li>
	</ul>
	<?php if($main->view == 'settings') : ?>
		<ul class="level2">
			<li><a class="icon-gauge <?php if($main->view == 'dashboard') print 'active';?>" href="/?view=dashboard">Показатели</a></li>
			<li><a class="icon-th <?php if($main->view == 'order') print 'active';?>" href="/?view=order">Заказы</a></li>
			<li><a class="icon-clock <?php if($main->view == 'task') print 'active';?>" href="/?view=task">Задачи</a></li>
			<li><a class="icon-rouble <?php if($main->view == 'payment') print 'active';?>" href="/?view=payment">Платежи</a></li>
			<li><a class="icon-users <?php if($main->view == 'contractor') print 'active';?>" href="/?view=contractor">Контрагенты</a></li>
			<li><a class="icon-cubes <?php if($main->view == 'storage') print 'active';?>" href="/?view=storage">Склад</a></li>
			<li><a class="icon-chart-area <?php if($main->view == 'reports') print 'active';?>" href="/?view=reports">Отчеты</a></li>
			<li><a class="icon-sliders <?php if($main->view == 'settings') print 'active';?>" href="/?view=settings">Настройки</a></li>
		</ul>
	<?php endif;?>
</div>