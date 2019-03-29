<?php
defined('EXEC') or die;

class checkUser {
	
	public function dataBase($data,$db){
		
		if(isset($data['login']) && isset($data['password'])){
			
			$login = checkInput::strip($data['login']);
			$searchUserLogin = $db->query("SELECT user_id FROM crm_users WHERE user_login='{$login}'");
			$sLogin = $searchUserLogin->fetch(PDO::FETCH_ASSOC);
			
			var_dump($sLogin);
			
			$pass = md5(checkInput::strip($data['password']));
			$searchUserPass = $db->query("SELECT user_id FROM crm_users WHERE user_pass='{$pass}'");
			$sPass = $searchUserPass->fetch(PDO::FETCH_ASSOC);
			
			var_dump($sPass);
			
			return true;
			
		}else{
			
			return false;
			
		}
		
	}
	
}


?>