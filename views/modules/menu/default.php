<?php
defined('EXEC') or die;
?>
<div class="menu">
	<?php print Render::module($main,'user',true);?>
	<ul>
		<li><a class="icon-gauge <?php if($main->view == 'dashboard') print 'active';?>" href="/?view=dashboard">Показатели</a></li>
		<li><a class="icon-th <?php if($main->view == 'order') print 'active';?>" href="/?view=order">Заказы</a></li>
		<li><a class="icon-clock <?php if($main->view == 'task') print 'active';?>" href="/?view=task">Задачи</a></li>
		<li><a class="icon-rouble <?php if($main->view == 'payment') print 'active';?>" href="/?view=payment">Платежи</a></li>
		<li><a class="icon-users <?php if($main->view == 'contractor') print 'active';?>" href="/?view=contractor">Контрагенты</a></li>
		<li><a class="icon-cubes <?php if($main->view == 'storage') print 'active';?>" href="/?view=storage">Склад</a></li>
		<li><a class="icon-chart-area <?php if($main->view == 'reports') print 'active';?>" href="/?view=reports">Отчеты</a></li>
		<?php if(Rules::seeSettings($main)) : ?>
		<li><a class="icon-sliders <?php if($main->view == 'settings') print 'active';?>" href="/?view=settings&params=general">Настройки</a></li>
		<?php endif;?>
	</ul>
	<?php if($main->view == 'settings' && Rules::seeSettings($main)) : ?>
		<ul class="level2">
			<li><a <?php if($main->params == 'general') print 'class="active"';?> href="/?view=settings&params=general">Общие</a></li>
			<li><a <?php if($main->params == 'workshop') print 'class="active"';?> href="/?view=settings&params=workshop">Мастерские</a></li>
			<li><a <?php if($main->params == 'worker') print 'class="active"';?> href="/?view=settings&params=worker">Сотрудники</a></li>
			<li><a <?php if($main->params == 'status') print 'class="active"';?> href="/?view=settings&params=status">Статусы</a></li>
			<li><a <?php if($main->params == 'notification') print 'class="active"';?> href="/?view=settings&params=notification">Оповещения</a></li>
			<li><a <?php if($main->params == 'services') print 'class="active"';?> href="/?view=settings&params=services">Перечень услуг</a></li>
			<li><a <?php if($main->params == 'handbook') print 'class="active"';?> href="/?view=settings&params=handbook">Справочники</a></li>
			<li><a <?php if($main->params == 'pricesdiscounts') print 'class="active"';?> href="/?view=settings&params=pricesdiscounts">Цены и скидки</a></li>
		</ul>
	<?php endif;?>
</div>