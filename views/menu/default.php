<?php
defined('EXEC') or die;
?>
<?php if($main->view == 'settings') print 'active';?>" 
<div class="menu">
	<ul>
		<li><a class="icon-gauge" href="/?view=dashboard">Показатели</a></li>
		<li><a class="icon-th" href="/?view=order">Заказы</a></li>
		<li><a class="icon-clock" href="/?view=task">Задачи</a></li>
		<li><a class="icon-rouble" href="/?view=payment">Платежи</a></li>
		<li><a class="icon-users" href="/?view=contractor">Контрагенты</a></li>
		<li><a class="icon-cubes" href="/?view=storage">Склад</a></li>
		<li><a class="icon-chart-area" href="/?view=reports">Отчеты</a></li>
		<li><a class="icon-sliders" href="/?view=settings">Настройки</a></li>
	</ul>
</div>