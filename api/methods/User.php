<?php
defined('EXEC') or die;

class User {
	
	public function find($data){
		
		if(isset($data['login']) && isset($data['password'])){
			
			$db = dataBase::pdo();
			
			if(strlen($data['login']) <= 50 && strlen($data['password']) <= 50){
				
				$login = Input::sanitise($data['login']);
				$pass = md5($data['password']);
				$searchUser = $db->query("SELECT * FROM crm_users WHERE user_login='{$login}' AND user_pass='{$pass}'");
				$user = $searchUser->fetch();

				if($user){
					return $user;
				}else{
					return false;
				}
				
			}else{
				return false;
			}
			
		}else{
			return false;
		}
		
	}
	
}


?>