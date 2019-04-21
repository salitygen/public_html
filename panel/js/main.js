document.addEventListener('DOMContentLoaded', function() {
	
	document.addEventListener('click',function(){
		var block = this.getElementById('workshopInfo');
		addClass(block,'hide');
	});

	function addClass(e,add){

		//ADD CLASS HIDE on CLICK
		if(e.className !== ''){
			var arrClass = e.className.split(" ");
			arrClass.forEach(function(cls){
				if(add !== cls){
					e.className += " " +add;
				}
			});
		}else{
			e.className += " " +add;
		}
	}
	
	
});