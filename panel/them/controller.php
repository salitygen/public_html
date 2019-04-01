<?php
defined('EXEC') or die;
$includePath = $main->root.'/panel/them/views/';

class Render {
	
	public function view($includePath,$viewFile,$params){
		$view = $includePath.'/'.$viewFile.'.php';
		if(!is_file($view)){
			return 'View "'.$view.'" not exists';
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
}

switch($view){
    case 'workshop':
		$page = Render::view($includePath . 'workshop' , 'default' , $params );
    break;
    case 'users':

    break;
    case '':

    break;
}

?>