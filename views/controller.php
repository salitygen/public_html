<?php
defined('EXEC') or die;

class Render {
	
	public function page($main){
		$view = $main->path.$main->view.'/default.php';
		if(!is_file($view)){
			return 'view page not exists';
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
	public function module($main,$module,$params){
		$view = $main->path.$module.'/default.php';
		if(!is_file($view)){
			return 'view module not exists';
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
}

if($view){
	$main->path = $main->root.'/views/';
	$main->view = $view;
	$main->params = $params;
	$page = Render::page($main);
}


?>