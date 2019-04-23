$(function(){
	
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
	
});