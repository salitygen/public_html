$(function(){
	
	$('.slideBlock').click(function(){
		$(this).toggleClass('hide');
	});
	
	$('p.succes i.close').click(function(){
		$(this).parent().slideUp('slow', function(){
			$(this).remove();
		});
	});
	
	$('p.succes').delay(5000).slideUp('slow', function(){
		$(this).remove();
	});
	
});