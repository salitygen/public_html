$(function(){
	
	$('.slideBlock').click(function(){
		$(this).toggleClass('hide');
	});
	
	$('p.succes i.close').click(function(){
		$(this).parent().remove();
	});
	
});