<?php
defined('EXEC') or die;
Rules::settingsGeneral($main) or die('Access Denied');

//Start info collection
$ws = Workshop::get($main->session->user_workshops_id);
$ws->addres = Addres::get($ws->workshop_addres_id);
$ws->mails = Mails::get($ws->workshop_mail_id);
$ws->phones = Phone::get($ws->workshop_phone_id);
//End info collection

var_dump($ws);

?>
<p>Информация о вашей компании</p>
<div id="workshopInfo">
	<form method="POST">
		<div class="workshopName">
			<label>Название</label>
			<input type="text" required="required" name="workshop_name" value="<?php print $ws->workshop_name; ?>">
		</div>
		<div class="workshopNote">
			<label>Дополнительная информация</label>
			<input type="text" name="workshop_note" value="<?php print $ws->workshop_note; ?>">
		</div>
		<div class="workshopPhones">
			<?php if($ws->phones) : ?>
			<?php foreach($ws->phones as $k => $phone):?>
			<div class="phoneDiv">
				<input type="text" name="phones[<?php print $k; ?>][value]" value="<?php print $phone->value; ?>">
				<input type="text" name="phones[<?php print $k; ?>][note]" value="<?php print $phone->note; ?>">
			</div>
			<?php endforeach;?>
			<?php else:?>
			<div class="phoneDiv">
				<input type="text" name="phones[0][value]" value="" placeholder="">
				<input type="text" name="phones[0][note]" value="" placeholder="">
			</div>
			<?php endif;?>
		</div>
		<div class="workshopMails">
			<?php if($ws->mails) : ?>
			<?php foreach($ws->mails as $k => $mail):?>
			<div class="mailDiv">
				<input type="text" name="mails[<?php print $k; ?>][value]" value="<?php print $mail->value; ?>">
				<input type="text" name="mails[<?php print $k; ?>][note]" value="<?php print $mail->note; ?>">
			</div>
			<?php endforeach;?>
			<?php else:?>
			<div class="mailDiv">
				<input type="text" name="mails[0][value]" value="" placeholder="">
				<input type="text" name="mails[0][note]" value="" placeholder="">
			</div>
			<?php endif;?>
		</div>
		<div class="workshopAddres">
			<?php if($ws->addres) : ?>
			<?php foreach($ws->addres as $k => $adres):?>
			<div class="addresDiv">
				<input type="text" name="addres[<?php print $k; ?>][value]" value="<?php print $adres->value; ?>">
				<input type="text" name="addres[<?php print $k; ?>][note]" value="<?php print $adres->note; ?>">
			</div>
			<?php endforeach;?>
			<?php else:?>
			<div class="addresDiv">
				<input type="text" name="addres[0][value]" value="" placeholder="">
				<input type="text" name="addres[0][note]" value="" placeholder="">
			</div>
			<?php endif;?>
		</div>
		<button class="save" type="submit">Сохранить</button>
	</form>
</div>
