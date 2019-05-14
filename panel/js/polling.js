$(function(){
	
	var phpsessid = $.cookie('PHPSESSID');
	var hash = getHash();
	
	function getHash(){
		$.ajax({
			url: '/api/polling.php?get_hash='+phpsessid,
			success: function(data){
				return data;
			}
		});
	}
	
	function pool(hash){
		
		var count = $.cookie('count').trim();
		$.ajax({
			async:true,
			cache: false,
			url: '/api/polling.php?poll='+count,
			success: function(data){
				if(data.trim() != 'next'){
					if(count != data.trim()){
						alert(data.trim());
						$.cookie('count',data.trim(),{ path: '/' });
						setTimeout(pool(hash), 1000);
					}
				}else{
					setTimeout(pool(hash), 1000);
				}	
			},
			error: function(){
				setTimeout(pool(hash), 10000);
			}
		});
		
	}
	
	setTimeout(pool(hash), 1000);
	
});