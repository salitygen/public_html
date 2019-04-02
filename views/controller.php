<?php
defined('EXEC') or die;

class Render {
	
	public function page($main){
		$view = $main->root.'/views/'.$main->view.'/default.php';
		if(!is_file($view)){
			return 'view page not exists';
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
	public function module($main,$module,$params){
		$view = $main->root.'/views/'.$module.'/default.php';
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
	$main->view = $view;
	$main->params = $params;
	$page = Render::page($main);
}


?>