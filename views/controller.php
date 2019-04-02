<?php
defined('EXEC') or die;

class This{
	public $path = $main->root.'/views/';
}

class Render {
	
	public function page($this){
		$view = $this->path.$this->view.'/default.php';
		if(!is_file($view)){
			return 'view page not exists';
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
	public function module($this,$module,$params){
		$view = $this->path.$module.'/default.php';
		if(!is_file($view)){
			return 'view module not exists';
		}else{
			ob_start();
			include($view);
			return ob_get_clean();
		}
	}
	
}

if($view){
	$this = new This;
	$this->view = $view;
	$this->params = $params;
	$page = Render::page($this);
}


?>