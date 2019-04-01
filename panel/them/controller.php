<?php
defined('EXEC') or die;
$path = $main->root.'/panel/them/views/';

class Render {
	
	public function view($path,$params){
		$view = $path.'.php';
		if(!is_file($view)){
			return 'View "'.$view.'" not exists';
		}else{
			extract($params);
			ob_start();
			include($view);
			$content = ob_get_contents();
			ob_end_clean();
			return $content;
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