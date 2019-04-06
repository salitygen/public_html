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
			<input type="text" required="required" name="workshop_name" value="<?php print $ws->workshop_name; ?>">
		</div>
		<div class="workshopNote">
			<input type="text" name="workshop_note" value="<?php print $ws->workshop_note; ?>">
		</div>
		<div class="workshopPhones">
			<?php if($ws->phones) : ?>
			<?php foreach($ws->phones as $k => $value):?>
				<input type="text" name="phones[<?php print $k; ?>]" value="<?php print $value; ?>">
			<?php endforeach;?>
			<?php else;?>
				<input type="text" name="phones[0]" value="" placeholder="">
			<?php endif;?>
		</div>
		<div class="workshopMails">
			<?php if($ws->mails) : ?>
			<?php foreach($ws->mails as $k => $value):?>
				<input type="text" name="mails[<?php print $k; ?>]" value="<?php print $value; ?>">
			<?php endforeach;?>
			<?php else;?>
				<input type="text" name="mails[0]" value="" placeholder="">
			<?php endif;?>
		</div>
		<div class="workshopAddres">
			<?php if($ws->addres) : ?>
			<?php foreach($ws->addres as $k => $value):?>
				<input type="text" name="addres[<?php print $k; ?>]" value="<?php print $value; ?>">
			<?php endforeach;?>
			<?php else;?>
				<input type="text" name="addres[0]" value="" placeholder="">
			<?php endif;?>
		</div>
		<button class="save" type="submit">Сохранить</button>
	</form>
</div>
