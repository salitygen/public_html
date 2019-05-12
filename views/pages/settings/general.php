<?php
defined('EXEC') or die;
Rules::settingsGeneral($main) or die('Access Denied');
$ws = General::get();
?>
<p>Информация о компании</p>
<div class="companyStatus">
<?php if($ws->general_status):?>
	<p>Работает</p>
<?php else:?>
	<p class="off">Не работает</p>
<?php endif;?>
</div>
<?php if($mess = SystemMessage::get($main)) print $mess; ?>
<div class="slideBlock">
	<form action="/?view=settings&params=general&task=update" method="POST">
		<div class="center">
		  <input type="checkbox" name="general_status" id="cbx" style="display:none" <?php if($ws->general_status) print 'checked="true"'; ?> >
		  <label for="cbx" class="toggle"><span></span></label>    
		</div>
		<div class="companyName">
			<label>Название</label>
			<input type="text" required="required" name="general_name" value="<?php if($ws->general_name != '') print $ws->general_name; ?>">
		</div>
		<div class="companyNote">
			<label>Дополнительная информация</label>
			<textarea name="general_note" ><?php if($ws->general_note != '') print $ws->general_note; ?></textarea>
		</div>
		<div class="companyPhones">
			<label>Номера телефонов</label>
			<?php if($ws->phones) : ?>
			<?php foreach($ws->phones as $k => $phone):?>
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
		<div class="companyMails">
			<label>Электронная почта</label>
			<?php if($ws->mails) : ?>
			<?php foreach($ws->mails as $k => $mail):?>
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
		<div class="companyAddres">
			<label>Адреса компании</label>
			<?php if($ws->addres) : ?>
			<?php foreach($ws->addres as $k => $adres):?>
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
		<button class="save" type="submit">Сохранить</button>
	</form>
</div>
