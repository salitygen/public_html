<?php
defined('EXEC') or die;

class This{
	public $includePath = $main->root.'/views/';
}

$this = new This;
$this->view = $view;
$this->params = $params;

class Render {
	
	public function view($this){
		$view = $this->includePath.$this->view.'/default.php';
		if(!is_file($view)){
			return 'View "'.$view.'" not exists';
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
}

if($view){
	$page = Render::view($this);
}


?>