$(function(){
	
	function pool(){

		var count = $.cookie('count').trim();
			var xhr = $.ajax({
				async:true,
				cache: false,
				url: '/api/polling.php?poll='+count,
				success: function(data){
					if(data.trim() != 'next'){
						if(count != data.trim()){
							alert(data.trim());
							$.cookie('count',data.trim(),{ path: '/' });
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
	
	setTimeout(pool, 1000);
	
	$('a').click(function(){
		xhr.abort();
	})
	
});