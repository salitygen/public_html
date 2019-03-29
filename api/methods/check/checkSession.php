<?php
defined('EXEC') or die;

class Session {
	
	public function check($userId){

		$db = dataBase::pdo();
		$searchUserSession = $db->query("SELECT * FROM crm_sessions WHERE session_user_id={$userId}");
		$sessions = $searchUserSession->fetch();
		
		print 'check:';
		var_dump($sessions);
		
		
		if($sessions){
			return $sessions;
		}else{
			return false;
		}
	
	}
	
	public function drop($userId){

		$db = dataBase::pdo();
		$dropAllUserSession = $db->query("DELETE FROM crm_sessions WHERE session_user_id={$userId}");
		$sessions = $dropAllUserSession->fetch(PDO::FETCH_NUM);
		
		print 'drop:';
		var_dump($sessions);

		//if($sessions->sess_id){
			return $sessions;
		//}else{
		//	return false;
		//}
	
	}
	
	public function create($userId){

		$db = dataBase::pdo();
		
		if($_SERVER['REMOTE_ADDR']){
			
			$sessIp = $_SERVER['REMOTE_ADDR'];
			$sessionCookie = md5($sessIp.''.rand(0,1000).''.time().''.$userId);
			
			$createUserSession = $db->query("INSERT INTO crm_sessions (session_ip,session_cookie,session_status,session_user_id) VALUES ('{$sessIp}','{$sessionCookie}',1,{$userId})");
			$sessions = $createUserSession->fetch();
			
			print 'create:';
			var_dump($sessions);

			//if($user->user_id){
				return $sessions;
			//}else{
			//	return false;
			//}
			
		}else{
			return false;
		}
	
	}
	
}


?>