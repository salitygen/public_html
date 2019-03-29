<?php
defined('EXEC') or die;


class checkUser {
	public function dataBase($data){
		$a = array();
		$a[0] = checkInput::strip($data['login']);
		$a[1] = checkInput::strip($data['password']);
		return $a;
	}
}


?>