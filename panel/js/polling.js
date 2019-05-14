$(function(){
	
	var phpsessid = $.cookie('PHPSESSID');
	
	function getHash(phpsessid){
		$.ajax({
			url: '/api/polling.php?get_hash='+phpsessid,
			success: function(data){
				setTimeout(pool(data), 1000);
			}
		});
	}
	
	getHash(phpsessid);
	
	function pool(hash){
		
		var count = $.cookie('count');
		$.ajax({
			async:true,
			cache: false,
			url: '/api/polling.php?poll='+count+'&hash='+hash,
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
	
});