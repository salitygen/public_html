document.addEventListener('DOMContentLoaded', function() {
	
	var item = document.querySelectorAll('#workshopInfo'),index;
	
	addClassById(item,'click','hide');
	
	//ADD CLASS on CLICK, HOVER.......
	function addClassById(elem,type,adClass){

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
	
});