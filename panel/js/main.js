document.addEventListener('DOMContentLoaded', function() {
	
/* 	//ADD CLASS HIDE on CLICK
	var addClass = 'hide';
	var findClass = document.getElementById("workshopInfo").className
	if(findClass !== ''){
		var arrClass = findClass.split(" ");
		arrClass.forEach(function(cls){
			if(addClass !== cls){
				document.getElementById("workshopInfo").className += " " +addClass;
			}
		});
	}else{
		document.getElementById("workshopInfo").className += " " +addClass;
	} */
	
	
	var block = document.getElementById('workshopInfo');

	block.addEventListener('click', function() {
		this.className += "123";
	});
	
	
	
});