<?php
defined('EXEC') or die;


class checkUser {
	public function dataBase($data){
		if(isset($data['login']) && isset($data['password'])){
			$login = checkInput::strip($data['login']);
			$pass = md5(checkInput::strip($data['password']));
			return true;
		}else{
			return false;
		}
	}
}


?>