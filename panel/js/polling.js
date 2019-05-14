$(function(){
	
	function pool(){
		
		var count = $.cookie('count');
			$.ajax({
				async:true,
				cache: false,
				url: '/?count='+count,
				success: function(data){
					if(data != 'next'){
						if(count != data){
							alert(data);
							$.cookie('count',data);
							pool();
						}
					}else{
						setTimeout(pool, 1000);
					}	
				},
				error: function(){
					setTimeout(pool, 10000);
				}
			});
		}
	
	pool();
	
});