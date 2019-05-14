$(function(){
	
	function pool(){
		
		var count = $.cookie('count');
			$.ajax({
				async:true,
				cache: false,
				url: '/?poll='+count,
				success: function(data){
					if(data != 'next'){
						if(count != data){
							alert(data);
							$.cookie('count',data);
							setTimeout(pool, 1000);
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