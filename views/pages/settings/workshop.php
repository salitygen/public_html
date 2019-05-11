<?php
defined('EXEC') or die;
Rules::settingsWorkshop($main) or die('Access Denied');

//if($main->session->group_service_id !== 0){
//	$workshops = Workshop::get($main->session->group_service_id); 
//}else{
	$workshops = Workshop::getAll();
//}

if(isset($_GET['id'])){
	$opened = (int)Input::getSanitise($_GET['id']);
}else{
	$opened = 0;
}
?>
<p>Мастерские</p>
<?php if($mess = SystemMessage::get($main)) print $mess; ?>
<div id="workshopList">
	<?php foreach($workshops as $workshop):?>
		<div class="slideBlock <?php print ($opened !== $workshop->workshop_id ? 'hide' : 'show' ); ?>">
			<form action="/?view=settings&params=workshop&task=update&id=<?php print $workshop->workshop_id; ?>" method="POST">
				<div class="panel">
					<div class="companyStatus">
					<?php if($workshop->workshop_status):?>
						<p>Работает</p>
					<?php else:?>
						<p class="off">Не работает</p>
					<?php endif;?>
					</div>
					<div class="center">
					  <input type="checkbox" name="workshop_status" id="cbx<?php print $workshop->workshop_id; ?>" style="display:none" <?php if($workshop->workshop_status) print 'checked="true"'; ?> >
					  <label for="cbx<?php print $workshop->workshop_id; ?>" class="toggle"><span></span></label>   
					</div>
					<button class="openClose icon-down-open"></button>
				</div>
				<div class="workshopName">
					<input type="text" disabled="disabled" required="required" name="workshop_name" value="<?php if($workshop->workshop_name != '') print $workshop->workshop_name; ?>">
				</div>
				<div class="workshopNote">
					<label>Дополнительная информация</label>
					<textarea name="workshop_note" ><?php if($workshop->workshop_note != '') print $workshop->workshop_note; ?></textarea>
				</div>
				<div class="workshopPhones">
					<label>Номера телефонов</label>
					<?php if($workshop->phones) : ?>
					<?php foreach($workshop->phones as $k => $phone):?>
					<div class="phoneDiv">
						<label>Телефон</label>
						<input type="text" name="phones[<?php print $k; ?>][value]" value="<?php print $phone->value; ?>">
						<label>Комментарий</label>
						<input type="text" name="phones[<?php print $k; ?>][note]" value="<?php print $phone->note; ?>">
						<div class="controls">
							<button class="icon-plus"></button>
							<?if($k !== 0):?>
							<button class="icon-cancel"></button>
							<?php endif;?>
						</div>
					</div>
					<?php endforeach;?>
					<?php else:?>
					<div class="phoneDiv">
						<label>Телефон</label>
						<input type="text" name="phones[0][value]" value="" placeholder="">
						<label>Комментарий</label>
						<input type="text" name="phones[0][note]" value="" placeholder="">
						<div class="controls">
							<button class="icon-plus"></button>
						</div>
					</div>
					<?php endif;?>
				</div>
				<div class="workshopMails">
					<label>Электронная почта</label>
					<?php if($workshop->mails) : ?>
					<?php foreach($workshop->mails as $k => $mail):?>
					<div class="mailDiv">
						<label>Почтовый ящик</label>
						<input type="text" name="mails[<?php print $k; ?>][value]" value="<?php print $mail->value; ?>">
						<label>Комментарий</label>
						<input type="text" name="mails[<?php print $k; ?>][note]" value="<?php print $mail->note; ?>">
						<div class="controls">
							<button class="icon-plus"></button>
							<?if($k !== 0):?>
							<button class="icon-cancel"></button>
							<?php endif;?>
						</div>
					</div>
					<?php endforeach;?>
					<?php else:?>
					<div class="mailDiv">
						<label>Почтовый ящик</label>
						<input type="text" name="mails[0][value]" value="" placeholder="">
						<label>Комментарий</label>
						<input type="text" name="mails[0][note]" value="" placeholder="">
						<div class="controls">
							<button class="icon-plus"></button>
						</div>
					</div>
					<?php endif;?>
				</div>
				<div class="workshopAddres">
					<label>Адреса компании</label>
					<?php if($workshop->addres) : ?>
					<?php foreach($workshop->addres as $k => $adres):?>
					<div class="addresDiv">
						<label>Адрес</label>
						<input type="text" name="addres[<?php print $k; ?>][value]" value="<?php print $adres->value; ?>">
						<label>Комментарий</label>
						<input type="text" name="addres[<?php print $k; ?>][note]" value="<?php print $adres->note; ?>">
						<div class="controls">
							<button class="icon-plus"></button>
							<?if($k !== 0):?>
							<button class="icon-cancel"></button>
							<?php endif;?>
						</div>
					</div>
					<?php endforeach;?>
					<?php else:?>
					<div class="addresDiv">
						<label>Адрес</label>
						<input type="text" name="addres[0][value]" value="" placeholder="">
						<label>Комментарий</label>
						<input type="text" name="addres[0][note]" value="" placeholder="">
						<div class="controls">
							<button class="icon-plus"></button>
						</div>
					</div>
					<?php endif;?>
				</div>
				<button class="save icon-floppy" name="workshop_id" value="<?php print $workshop->workshop_id; ?>" type="submit">Сохранить</button>
			</form>
		</div>
	<?php endforeach;?>
</div>