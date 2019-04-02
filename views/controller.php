<?php
defined('EXEC') or die;

/* class Render {
	
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
	
} */

class ThisPage {
	public $test = '123';
}

$this = new ThisPage;

if($view){
	$this->path = $main->root.'/views/';
	$this->view = $view;
	$this->params = $params;
	var_dump($this);
	//$page = Render::page($this);
}


?>