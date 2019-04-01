<?php

defined('EXEC') or die;
$includePath = $main->root.'/panel/them/views/';

class Render {
	
	public function view($includePath,$params){
		$view = $includePath.'/default.php';
		if(!is_file($view)){
			return 'View "'.$view.'" not exists';
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
}

if($view){
	$page = Render::view($includePath.$view,$params);
}


?>