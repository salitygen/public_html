<?php
defined('EXEC') or die;

if($view){
	$main->view = $view;
	$main->params = $params;
	$main->task = $task;
	$page = Render::view($main);
}else{
	header("location: /?view=dashboard");
}

class Render {
	
	public function view($main){
		//var_dump($main);
		if(!$main->params){
			$view = $main->root.'/views/pages/'.$main->view.'/default.php';
			if(!is_file($view)){
				return 'view page not exists';
			}else{
				ob_start();
				include($view);
				return ob_get_clean();
			}
		}else{
			$view = $main->root.'/views/pages/'.$main->view.'/'.$main->params.'.php';
			if(!is_file($view)){
				return 'view page not exists';
			}else{
				ob_start();
				include($view);
				return ob_get_clean();
			}
		}
	}
	
	public function module($main,$module,$params){
		$view = $main->root.'/views/modules/'.$module.'/default.php';
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