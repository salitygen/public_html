<?php
defined('EXEC') or die;

class CSRF {
	
	public function set() {
		$csrf = md5(md5(time().rand(0, 1000)) . rand(0, 1000));
		$_SESSION['csrf'] = $csrf;
		return (string)$csrf;
	}
	
	public function get() {
		$csrf = Input::getSanitise($_SESSION['csrf']);
		return (string)$csrf;
	}
	
	public function check($data = false){
		
		if($data){
			
			$data = Input::postSanitise($data);
			$csrf = CSRF::get();
			$newcsr = CSRF::set();
			if($data == $csrf){
				return $newcsr;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
		
	}
	
}

?>