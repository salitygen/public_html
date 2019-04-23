$(function(){
	
	// WORKSHOPS SETTINGS PAGE START
	
	$('button.openClose').click(function(){
		$(this).parent().parent().parent().toggleClass('hide');
		var input = $(this).parent().parent().parent().find('input[name="workshop_name"]');
		input.attr('disabled') ? input.removeAttr('disabled') : input.attr('disabled','disabled');
		return false;
	});
	
	$('p.succes i.close').click(function(){
		$(this).parent().remove();
	});
	
	$('p.succes').delay(5000).fadeOut('slow', function(){
		$(this).remove();
	});
	
	$('body').on('click','.workshopPhones .controls button.icon-plus',function(){
		var workPhones = $(this).parent().parent().parent();
		var index = parseInt(workPhones.find('.phoneDiv input').last().attr('name').split('[')[1].split(']')[0]) + 1;
		var inputs ='<div class="phoneDiv">';
			inputs +='<label>Телефон</label>';
			inputs +='<input type="text" name="phones['+index+'][value]" value="">';
			inputs +='<label>Комментарий</label>';
			inputs +='<input type="text" name="phones['+index+'][note]" value="">';
			inputs +='<div class="controls">';
			inputs +='<button class="icon-plus"></button>';
			inputs +='<button class="icon-cancel"></button>';
			inputs +='</div>';
			inputs +='</div>';
		workPhones.append(inputs); 
		return false;
	});
	
	$('body').on('click','.workshopPhones .controls button.icon-cancel',function(){
		var removeBlock = $(this).parent().parent();
		removeBlock.remove();
		return false;
	});

	// WORKSHOPS SETTINGS PAGE END
	
});