$(function(){
	
	// SETTINGS PAGE START
	
	$('button.openClose').click(function(){
		$(this).parent().parent().parent().toggleClass('hide');
		var input = $(this).parent().parent().parent().find('.name input');
		input.attr('disabled') ? input.removeAttr('disabled') : input.attr('disabled','disabled');
		return false;
	});
	
	$('.slideBlock.show input').removeAttr('disabled');
	
	$('p.succes i.close,p.error i.close').click(function(){
		$(this).parent().remove();
	});
	
	$('p.succes,p.error').delay(5000).fadeOut('slow', function(){
		$(this).remove();
	});
	
	$('body').on('click','.phones .controls button.icon-plus',function(){
		var phones = $(this).parent().parent().parent();
		var index = parseInt(phones.find('.phoneDiv input').last().attr('name').split('[')[1].split(']')[0]) + 1;
		var inputs  ='<div class="phoneDiv">';
			inputs +='<label>Телефон</label>';
			inputs +='<input type="text" name="phones['+index+'][value]" value="">';
			inputs +='<label>Комментарий</label>';
			inputs +='<input type="text" name="phones['+index+'][note]" value="">';
			inputs +='<div class="controls">';
			inputs +='<button class="icon-plus"></button>';
			inputs +='<button class="icon-cancel"></button>';
			inputs +='</div>';
			inputs +='</div>';
		phones.append(inputs); 
		return false;
	});
	
	$('body').on('click','.phones .controls button.icon-cancel',function(){
		var removeBlock = $(this).parent().parent();
		removeBlock.remove();
		return false;
	});
	
	$('body').on('click','.mails .controls button.icon-plus',function(){
		var mails = $(this).parent().parent().parent();
		var index = parseInt(mails.find('.mailDiv input').last().attr('name').split('[')[1].split(']')[0]) + 1;
		var inputs  ='<div class="mailDiv">';
			inputs +='<label>Почтовый ящик</label>';
			inputs +='<input type="text" name="mails['+index+'][value]" value="">';
			inputs +='<label>Комментарий</label>';
			inputs +='<input type="text" name="mails['+index+'][note]" value="">';
			inputs +='<div class="controls">';
			inputs +='<button class="icon-plus"></button>';
			inputs +='<button class="icon-cancel"></button>';
			inputs +='</div>';
			inputs +='</div>';
		mails.append(inputs); 
		return false;
	});
	
	$('body').on('click','.mails .controls button.icon-cancel',function(){
		var removeBlock = $(this).parent().parent();
		removeBlock.remove();
		return false;
	});
	
	$('body').on('click','.addres .controls button.icon-plus',function(){
		var addres = $(this).parent().parent().parent();
		var index = parseInt(addres.find('.addresDiv input').last().attr('name').split('[')[1].split(']')[0]) + 1;
		var inputs  ='<div class="addresDiv">';
			inputs +='<label>Адрес</label>';
			inputs +='<input type="text" name="addres['+index+'][value]" value="">';
			inputs +='<label>Комментарий</label>';
			inputs +='<input type="text" name="addres['+index+'][note]" value="">';
			inputs +='<div class="controls">';
			inputs +='<button class="icon-plus"></button>';
			inputs +='<button class="icon-cancel"></button>';
			inputs +='</div>';
			inputs +='</div>';
		addres.append(inputs); 
		return false;
	});
	
	$('body').on('click','.addres .controls button.icon-cancel',function(){
		var removeBlock = $(this).parent().parent();
		removeBlock.remove();
		return false;
	});
	
	$('.listChkBlocks').masonry({
	  itemSelector: '.chkblock',
	  columnWidth: 487
	});

	// SETTINGS PAGE END
	
});