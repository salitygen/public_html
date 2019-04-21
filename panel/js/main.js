document.addEventListener('DOMContentLoaded', function() {
	
	document.querySelector('#workshopInfo').addEventListener('click', function(){
		addClass(this,'hide');
	});

	function addClass(e,add){

		//ADD CLASS on CLICK
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
	
});
	
	
});