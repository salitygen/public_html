<?php
defined('EXEC') or die;

class User {
	
	public function find($data){
		
		if(isset($data['login']) && isset($data['password'])){
			
			if(!is_array($data['login']) || !is_array($data['password'])){
				if(mb_strlen((string)$data['login']) > 50 || mb_strlen((string)$data['password']) > 50){
					return false;
				}
			}else{
				return false;
			}
			
			$db = dataBase::pdo();
			
			$login = Input::sanitise($data['login']);
			$pass = md5(Input::sanitise($data['password']));
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
		
	}
	
}


?>