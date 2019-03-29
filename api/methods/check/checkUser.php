<?php
defined('EXEC') or die;

class checkUser {
	
	public function dataBase($data){
		
		if(isset($data['login']) && isset($data['password'])){
			
			$login = checkInput::strip($data['login']);
			$pass = md5(checkInput::strip($data['password']));
			$searchUserLogin = dataBase::pdo->query("SELECT user_id FROM crm_users WHERE user_login='{$login}' AND user_pass='{$pass}'");
			$sLogin = $searchUserLogin->fetch(PDO::FETCH_ASSOC);
			
			if($sLogin['user_id']){
				return true;
			}else{
				return false;
			}
			
		}else{
			
			return false;
			
		}
		
	}
	
}


?>