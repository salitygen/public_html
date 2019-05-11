<?php
defined('EXEC') or die;
?>
<div class="menu">
	<?php print Render::view($main,'module','user',false);?>
	<ul>
		<?php if(Rules::showCompanyPerformance($main)) : ?>
		<li><a class="icon-gauge <?php if($main->view == 'dashboard') print 'active';?>" href="/?view=dashboard">Показатели</a></li>
		<?php endif;?>
		<?php if(Rules::seeOrders($main)) : ?>
		<li><a class="icon-th <?php if($main->view == 'order') print 'active';?>" href="/?view=order">Заказы</a></li>
		<?php endif;?>
		<?php if(Rules::seeTask($main)) : ?>
		<li><a class="icon-clock <?php if($main->view == 'task') print 'active';?>" href="/?view=task">Задачи</a></li>
		<?php endif;?>
		<?php if(Rules::seePayments($main)) : ?>
		<li><a class="icon-rouble <?php if($main->view == 'payment') print 'active';?>" href="/?view=payment">Платежи</a></li>
		<?php endif;?>
		<?php if(Rules::seeContractors($main)) : ?>
		<li><a class="icon-users <?php if($main->view == 'contractor') print 'active';?>" href="/?view=contractor">Контрагенты</a></li>
		<?php endif;?>
		<?php if(Rules::seeStorage($main)) : ?>
		<li><a class="icon-cubes <?php if($main->view == 'storage') print 'active';?>" href="/?view=storage">Склад</a></li>
		<?php endif;?>
		<?php if(Rules::seeReports($main)) : ?>
		<li><a class="icon-chart-area <?php if($main->view == 'reports') print 'active';?>" href="/?view=reports">Отчеты</a></li>
		<?php endif;?>
		<?php if(Rules::seeSettings($main)) : ?>
		<li><a class="icon-sliders <?php if($main->view == 'settings') print 'active';?>" href="/?view=settings&params=general">Настройки</a></li>
		<?php endif;?>
	</ul>
	<?php if($main->view == 'settings' && Rules::seeSettings($main)) : ?>
		<ul class="level2">
			<?php if(Rules::settingsGeneral($main)) : ?>
			<li><a <?php if($main->params == 'general') print 'class="active"';?> href="/?view=settings&params=general">Компания</a></li>
			<?php endif;?>
			<?php if(Rules::settingsService($main)) : ?>
			<li><a <?php if($main->params == 'service') print 'class="active"';?> href="/?view=settings&params=service">Сервис-центры</a></li>
			<?php endif;?>
			<?php if(Rules::settingsWorkshop($main)) : ?>
			<li><a <?php if($main->params == 'workshop') print 'class="active"';?> href="/?view=settings&params=workshop">Мастерские</a></li>
			<?php endif;?>
			<?php if(Rules::settingsGroups($main)) : ?>
			<li><a <?php if($main->params == 'groups') print 'class="active"';?> href="/?view=settings&params=groups">Группы</a></li>
			<?php endif;?>
			<?php if(Rules::settingsWorkers($main)) : ?>
			<li><a <?php if($main->params == 'workers') print 'class="active"';?> href="/?view=settings&params=workers">Сотрудники</a></li>
			<?php endif;?>
			<?php if(Rules::settingsStatuses($main)) : ?>
			<li><a <?php if($main->params == 'status') print 'class="active"';?> href="/?view=settings&params=status">Статусы</a></li>
			<?php endif;?>
			<?php if(Rules::settingsNotification($main)) : ?>
			<li><a <?php if($main->params == 'notification') print 'class="active"';?> href="/?view=settings&params=notification">Оповещения</a></li>
			<?php endif;?>
			<?php if(Rules::settingsListServices($main)) : ?>
			<li><a <?php if($main->params == 'pricelist') print 'class="active"';?> href="/?view=settings&params=pricelist">Перечень услуг</a></li>
			<?php endif;?>
			<?php if(Rules::settingsHandbook($main)) : ?>
			<li><a <?php if($main->params == 'handbook') print 'class="active"';?> href="/?view=settings&params=handbook">Справочники</a></li>
			<?php endif;?>
			<?php if(Rules::settingsSalePrices($main)) : ?>
			<li><a <?php if($main->params == 'pricesdiscounts') print 'class="active"';?> href="/?view=settings&params=pricesdiscounts">Цены и скидки</a></li>
			<?php endif;?>
		</ul>
	<?php endif;?>
</div>