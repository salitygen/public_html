<?php
defined('EXEC') or die;
$path = $main->root.'/panel/them/views/';

class Render {
	
	public function view($path,$params){
		$view = $path.'.php';
		if(!is_file($view)){
			return 'View "'.$view.'" not exists';
		}else{
			ob_start();
			$params = $params;
			include($view);
			return ob_get_clean();
		}
	}
	
}

switch($view){
    case 'workshop':
		$page = Render::view($path.'workShop',$params);
    break;
    case '':

    break;
    case '':

    break;
}

?>