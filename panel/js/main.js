$(function(){
	
	$('.slideBlock').click(function(){
		$(this).toggleClass('hide');
	});
	
	$('p.succes i.close').click(function(){
		$(this).parent().fadeOut('slow', function(){
			$(this).remove();
		});
	});
	
	$('p.succes').delay(5000).fadeOut('slow', function(){
		$(this).remove();
	});
	
});