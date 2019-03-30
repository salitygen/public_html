<?php
defined('EXEC') or die;

class User {
	
	public function findBase($data){
		
		if(isset($data['login']) && isset($data['password'])){
			
			$db = dataBase::pdo();
			$login = Input::sanitise($data['login']);
			$pass = md5(Input::sanitise($data['password']));
			$searchUserLogin = $db->query("SELECT * FROM crm_users WHERE user_login='{$login}' AND user_pass='{$pass}'");
			$user = $searchUserLogin->fetch();

			if($user){
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