<?php
defined('EXEC') or die;
$path = $main->root.'/panel/them/views/';

class Render {
	
	public function view($path,$params){
		$view = $path.'.php';
		if(!is_file($view)){
			return 'View "'.$view.'" not exists';
		}else{
			var_dump($params);
			ob_start();
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