<?php
defined('EXEC') or die;
$includePath = $main->root.'/views/';

class This;
$this = new This;

class Render {
	
	public function view($includePath,$view,$params){
		$this->page = $view;
		$view = $includePath.$view.'/default.php';
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
	$page = Render::view($includePath,$view,$params);
}


?>