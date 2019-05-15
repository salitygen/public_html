<?php
defined('EXEC') or die;

class CSRF {
	
	public function set() {
		$csrf = md5(md5(time().rand(0, 1000)) . rand(0, 1000));
		setcookie('csrf', $csrf);
		return (string)$csrf;
	}
	
	public function get() {
		$csrf = Input::getSanitise($_COOKIE['csrf']);
		return (string)$csrf;
	}
	
}

?>