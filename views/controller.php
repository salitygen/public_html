<?php
defined('EXEC') or die;

class Render {
	
	public function view($main, $type, $module, $params){
		
		$error = $main->root.'/views/pages/error.php';
		$view = $error;
		
		if($type == 'page'){
			if($params){
				$view = $main->root.'/views/pages/'.$main->view.'/default.php';
			}else{
				if($main->params){
					$view = $main->root.'/views/pages/'.$main->view.'/'.$main->params.'.php';
				}else{
					$view = $main->root.'/views/pages/'.$main->view.'/index.php';
				}
			}
		}else if($type == 'module'){
			$view = $main->root.'/views/modules/'.$module.'/default.php';
		}
		
		if(!is_file($view)){
			ob_start();
			include($error);
			return ob_get_clean();
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
}

?>