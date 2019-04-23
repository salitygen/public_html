$(function(){
	
	$('button.openClose').click(function(){
		$(this).parent().parent().parent().toggleClass('hide');
		return false;
	});
	
	$('p.succes i.close').click(function(){
		$(this).parent().remove();
	});
	
	$('p.succes').delay(5000).fadeOut('slow', function(){
		$(this).remove();
	});
	
});