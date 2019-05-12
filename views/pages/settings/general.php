<?php
defined('EXEC') or die;
Rules::settingsGeneral($main) or die('Access Denied');
$company = General::get();
?>
<p>Информация о компании</p>
<?php if($mess = SystemMessage::get($main)) print $mess; ?>
<div class="slideBlock">
	<form action="/?view=settings&params=general&task=update" method="POST">
		<div class="panel">
			<div class="status">
				<?php if($company->general_status):?>
				<p>Работает</p>
				<?php else:?>
				<p class="off">Не работает</p>
				<?php endif;?>
			</div>
			<div class="center">
			  <input type="checkbox" name="general_status" id="cbx" style="display:none" <?php if($company->general_status) print 'checked="true"'; ?> >
			  <label for="cbx" class="toggle"><span></span></label>    
			</div>
			<button class="openClose icon-down-open"></button>
		</div>
		<div class="companyName">
			<input type="text" required="required" name="general_name" value="<?php if($company->general_name != '') print $company->general_name; ?>">
		</div>
		<div class="companyNote">
			<label>Дополнительная информация</label>
			<textarea name="general_note" ><?php if($company->general_note != '') print $company->general_note; ?></textarea>
		</div>
		<div class="companyPhones">
			<label>Номера телефонов</label>
			<?php if($company->phones) : ?>
			<?php foreach($company->phones as $k => $phone):?>
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
			<?php if($company->mails) : ?>
			<?php foreach($company->mails as $k => $mail):?>
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
			<?php if($company->addres) : ?>
			<?php foreach($company->addres as $k => $adres):?>
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
