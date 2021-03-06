<?php
defined('EXEC') or die;
Rules::settingsGroups($main) or die('Access Denied');
$groups = Groups::getAll();

if(isset($_GET['id'])){
	$opened = (int)Input::getSanitise($_GET['id']);
}else{
	$opened = 0;
}

?>
<p>Группы</p>
<?php if($mess = SystemMessage::get($main)) print $mess; ?>
<div id="groupList">
	<?php foreach($groups as $group):?>
	<div class="slideBlock <?php print ($opened !== $group->group_id ? 'hide' : 'show' ); ?>">
		<form action="/?view=settings&params=groups&task=update&id=<?php print $group->group_id; ?>" method="POST">
			<div class="panel">
				<button class="openClose icon-down-open"></button>
			</div>
			<div class="groupName name">
				<input type="text" disabled="disabled" required="required" name="group_name" value="<?php print $group->group_name; ?>">
			</div>
			<div class="groupNote note">
				<label><?php print HTML::Name($main,'groups','GROUP_DESC'); ?></label>
				<textarea name="group_desc"><?php print $group->group_desc; ?></textarea>
			</div>
			<div class="listChkBlocks">
			
				<?php
				
					$n1 = '';

					foreach($group as $key => $value){
						
						next($group);
						$name = explode('_',$key)[1];
						$key2 = key($group);
						
						if($key2 !== null){
							$name2 = explode('_',$key2)[1];
						}else{
							$name2 = '';
						}
						
 						if($name != 'id'
						&& $name != 'name'
						&& $name != 'desc'){
							
							if($n1 != $name){
								$n1 = $name;
								print '<div class="chkblock">';
								print '<h3>'. HTML::Name($main,'groups',$name) .'</h3>';
							}
							
							print '<label>';
							print '<input type="hidden" name="ch['.$key.']" value="0">';
							print '<input type="checkbox" value="1" name="ch['.$key.']" '.($value == 1 ? 'checked="checked"' : '').'>'. HTML::Name($main,'groups',$key);
							print '</label>';
							

							
							if($name2 != $name){
								
								print '</div>';
								
							}
						
						}		
					
					}
					
				?>
				
			</div>
			<input type="hidden" name="csrf" value="<?php print $main->csrf; ?>">
			<button class="save icon-floppy" type="submit" name="group_id" value="<?php print $group->group_id; ?>"><?php print HTML::Name($main,'global','SAVE') ?></button>
		</form>
	</div>
	<?php endforeach;?>
</div>