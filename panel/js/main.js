$(function(){
	$('#workshopInfo').click(function(e){
		e.addClass('hide');
	});
});
/* document.addEventListener('DOMContentLoaded', function() {
	
	addClassById('workshopInfo','click','hide');
	
	//================================
	//================================
	//ADD CLASS on CLICK, HOVER.......
	function addClassById(elem,type,adClass){

		var item = document.querySelectorAll("#"+elem),index;
	
		for(index = 0; index < item.length; index++){
			item[index].addEventListener(type, function () {
				addClass(this,adClass);
			});
		}

		function addClass(e,add){
			//ADD CLASS
			if(e.className != ''){
				var arrClass = e.className.split(" ");
				arrClass.forEach(function(cls,i){
					if(add != cls){
						e.className += " " +add;
					}
				});
			}else{
				e.className += add;
			}
		}
		
	}
	
}); */