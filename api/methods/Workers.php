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
			
			$searchWorker = $db->query("SELECT * FROM crm_users WHERE user_login='{$login}' AND user_pass='{$pass}'");
			$worker = $searchWorker->fetch();

			if($worker){
				return $worker;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
		
	}
	
	public function get($id){
		
		$db = dataBase::pdo();
		
		$getOneWorkers = $db->query("SELECT * FROM crm_users WHERE user_id='{$id}'");
		$workers = $getOneWorkers->fetchAll();

		if($workers){
			return $workers;
		}else{
			return false;
		}
		
	}
	
	public function getService($id){
		
		$db = dataBase::pdo();
		
		$getAllServiceWorkers = $db->query("SELECT * FROM crm_users WHERE user_service_id='{$id}'");
		$workers = $getAllServiceWorkers->fetchAll();

		if($workers){
			return $workers;
		}else{
			return false;
		}
		
	}
	
	public function getWorkshop($id){
		
		$db = dataBase::pdo();
		
		$getAllWorkshopWorkers = $db->query("SELECT * FROM crm_users WHERE user_workshop_id='{$id}'");
		$workers = $getAllWorkshopWorkers->fetchAll();

		if($workers){
			return $workers;
		}else{
			return false;
		}
		
	}
	
	public function getAll(){
		
		$db = dataBase::pdo();
		
		$getAllWorkers = $db->query("SELECT * FROM crm_users");
		$workers = $getAllWorkers->fetchAll();

		if($workers){
			return $workers;
		}else{
			return false;
		}
		
	}
	
}


?>