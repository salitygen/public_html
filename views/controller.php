<?php
defined('EXEC') or die;

$main->view = $view;
$main->params = $params;

if($view){
	$page = Render::page($main);
}

class Render {
	
	public function page($main){
		if($main->params){
			$view = $main->root.'/views/'.$main->view.'/'.$main->params.'.php';
			if(!is_file($view)){
				$view = $main->root.'/views/'.$main->view.'/default.php';
			}
		}else{
			$view = $main->root.'/views/'.$main->view.'/default.php';
		}
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

?>