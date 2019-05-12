<?php
defined('EXEC') or die;
Rules::settingsService($main) or die('Access Denied');

if($main->session->group_service_id !== 0){
	$services = Service::get($main->session->group_service_id); 
}else{
	$services = Service::getAll(); 
}

if(isset($_GET['id'])){
	$opened = (int)Input::getSanitise($_GET['id']);
}else{
	$opened = 0;
}
 
?>
<p>Сервисные центры</p>
<?php if($mess = SystemMessage::get($main)) print $mess; ?>
<div id="serviceList">
	<?php foreach($services as $service): ?>
	<div class="slideBlock <?php print ($opened !== $service->service_id ? 'hide' : 'show' ); ?>">
		<form action="/?view=settings&params=service&task=update&id=<?php print $service->service_id; ?>" method="POST">
			<div class="panel">
				<div class="companyStatus">
				<?php if($service->service_status):?>
					<p>Работает</p>
				<?php else:?>
					<p class="off">Не работает</p>
				<?php endif;?>
				</div>
				<div class="center">
				  <input type="checkbox" name="service_status" id="cbx" style="display:none" <?php if($service->service_status) print 'checked="true"'; ?> >
				  <label for="cbx" class="toggle"><span></span></label>    
				</div>
				<button class="openClose icon-down-open"></button>
			</div>
			<div class="serviceName">
				<input type="text" required="required" name="service_name" value="<?php if($service->service_name != '') print $service->service_name; ?>">
			</div>
			<div class="serviceNote">
				<label>Дополнительная информация</label>
				<textarea name="service_note" ><?php if($service->service_note != '') print $service->service_note; ?></textarea>
			</div>
			<div class="servicePhones">
				<label>Номера телефонов</label>
				<?php if($service->phones) : ?>
				<?php foreach($service->phones as $k => $phone):?>
				<div class="phoneDiv">
					<label>Телефон</label>
					<input type="text" name="phones[<?php print $k; ?>][value]" value="<?php print $phone->value; ?>">
					<label>Комментарий</label>
					<input type="text" name="phones[<?php print $k; ?>][note]" value="<?php print $phone->note; ?>">
				</div>
				<?php endforeach;?>
				<?php else:?>
				<div class="phoneDiv">
					<label>Телефон</label>
					<input type="text" name="phones[0][value]" value="" placeholder="">
					<label>Комментарий</label>
					<input type="text" name="phones[0][note]" value="" placeholder="">
				</div>
				<?php endif;?>
			</div>
			<div class="serviceMails">
				<label>Электронная почта</label>
				<?php if($service->mails) : ?>
				<?php foreach($service->mails as $k => $mail):?>
				<div class="mailDiv">
					<label>Почтовый ящик</label>
					<input type="text" name="mails[<?php print $k; ?>][value]" value="<?php print $mail->value; ?>">
					<label>Комментарий</label>
					<input type="text" name="mails[<?php print $k; ?>][note]" value="<?php print $mail->note; ?>">
				</div>
				<?php endforeach;?>
				<?php else:?>
				<div class="mailDiv">
					<label>Почтовый ящик</label>
					<input type="text" name="mails[0][value]" value="" placeholder="">
					<label>Комментарий</label>
					<input type="text" name="mails[0][note]" value="" placeholder="">
				</div>
				<?php endif;?>
			</div>
			<div class="serviceAddres">
				<label>Адреса компании</label>
				<?php if($service->addres) : ?>
				<?php foreach($service->addres as $k => $adres):?>
				<div class="addresDiv">
					<label>Адрес</label>
					<input type="text" name="addres[<?php print $k; ?>][value]" value="<?php print $adres->value; ?>">
					<label>Комментарий</label>
					<input type="text" name="addres[<?php print $k; ?>][note]" value="<?php print $adres->note; ?>">
				</div>
				<?php endforeach;?>
				<?php else:?>
				<div class="addresDiv">
					<label>Адрес</label>
					<input type="text" name="addres[0][value]" value="" placeholder="">
					<label>Комментарий</label>
					<input type="text" name="addres[0][note]" value="" placeholder="">
				</div>
				<?php endif;?>
			</div>
			<button class="save" name="service_id" value="<?php print $service->service_id; ?>" type="submit">Сохранить</button>
		</form>
	</div>
	<?php endforeach;?>
</div>
