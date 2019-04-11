<?php
defined('EXEC') or die;

if($view){
	$main->view = $view;
	$main->params = $params;
	$main->task = $task;
}else{
	header("location: /?view=dashboard");
}

class Render {
	
	public function view($main,$type,$module,$params){
		
		if($type == 'pages'){
			if(!$main->params){
				$view = $main->root.'/views/'.$type.'/'.$main->view.'/default.php';
			}else{
				$view = $main->root.'/views/'.$type.'/'.$main->view.'/'.$main->params.'.php';
				$main->params = false;
			}
		}else if($type == 'modules'){
			$view = $main->root.'/views/'.$type.'/'.$module.'/default.php';
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