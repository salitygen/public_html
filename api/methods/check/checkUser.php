<?php
defined('EXEC') or die;

class User {
	
	public function findBase($data){
		
		if(isset($data['login']) && isset($data['password'])){
			
			$db = dataBase::pdo();
			$login = checkInput::strip($data['login']);
			$pass = md5(checkInput::strip($data['password']));
			$searchUserLogin = $db->query("SELECT * FROM crm_users WHERE user_login='{$login}' AND user_pass='{$pass}'");
			$user = $searchUserLogin->fetch(PDO::FETCH_ASSOC);

			if($user['user_id']){
				return $user;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
		
	}
	
}


?>