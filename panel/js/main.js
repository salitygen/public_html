$(function(){
	
	$('button.openClose').click(function(){
		$(this).parent().parent().parent().toggleClass('hide');
		$(this).parent().parent().parent().find('input[name="workshop_name"]').removeAttr('disable');
		return false;
	});
	
	$('p.succes i.close').click(function(){
		$(this).parent().remove();
	});
	
	$('p.succes').delay(5000).fadeOut('slow', function(){
		$(this).remove();
	});
	
});