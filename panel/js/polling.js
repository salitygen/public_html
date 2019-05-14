$(function(){
	
	function pool(){
		
		var count = $.cookie('count').trim();
			$.ajax({
				async:true,
				cache: false,
				url: '/api/polling.php?poll='+count,
				success: function(data){
					if(data.trim() != 'next'){
						if(count != data.trim()){
							alert(data.trim());
							$.cookie('count',data.trim());
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