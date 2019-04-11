<?php
defined('EXEC') or die;

if($view){
	$main->view = $view;
	$main->params = $params;
	$main->task = $task;
	$page = Render::view($main,false,false);
}else{
	header("location: /?view=dashboard");
}

class Render {
	
	public function view($main,$module,$params){
		
		if(!$module){
			if(!$main->params){
				$view = $main->root.'/views/pages/'.$main->view.'/default.php';
			}else{
				$view = $main->root.'/views/pages/'.$main->view.'/'.$main->params.'.php';
				$main->params = false;
			}
		}else{
			$view = $main->root.'/views/modules/'.$module.'/default.php';
		}
		
		if(!is_file($view)){
			return 'view page not exists';
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
}

?>