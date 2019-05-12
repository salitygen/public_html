<?php
defined('EXEC') or die;

class Workers {
	
	public function findLoginPass($data){
		
		if(isset($data['login']) && isset($data['password'])){
			
			$db = dataBase::pdo();
			
			$login = Input::postSanitise($data['login']);
			$pass = Input::postSanitise($data['password']);
			
			if(mb_strlen($pass) <= 50){
				$pass = md5($pass);
			}else{
				return false;
			}
			
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
	
	public function get($id){
		
	}
	
	public function getAll(){
		
		$getAllUsers = $db->query("SELECT * FROM crm_users ");
		$users = $getAllUsers->fetchAll();

		if($users){
			return $users;
		}else{
			return false;
		}
		
	}
	
}


?>