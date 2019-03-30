<?php
defined('EXEC') or die;

class Session {
	
	public function get($userId,$sessionId){

		$db = dataBase::pdo();
		$searchUserSession = $db->query("SELECT * FROM crm_sessions WHERE session_user_id={$userId} AND sess_id={$sessionId}");
		$sessions = $searchUserSession->fetch();
		
		if($sessions){
			return $sessions;
		}else{
			return false;
		}
	
	}
	
	public function getAll($userId){

		$db = dataBase::pdo();
		$searchUserSession = $db->query("SELECT * FROM crm_sessions WHERE session_user_id={$userId}");
		$sessions = $searchUserSession->fetch();
		
		if($sessions){
			return $sessions;
		}else{
			return false;
		}
	
	}
	
	public function dropAll($userId){

		$db = dataBase::pdo();
		$sessions = $db->exec("DELETE FROM crm_sessions WHERE session_user_id={$userId}");
		
		if($sessions){
			return true;
		}else{
			return false;
		}
	
	}
	
	public function drop($userId,$sessionId){

		$db = dataBase::pdo();
		$sessions = $db->exec("DELETE FROM crm_sessions WHERE session_user_id={$userId} AND sess_id={$sessionId}");
		
		if($sessions){
			return true;
		}else{
			return false;
		}
	
	}
	
	public function create($userId){

		$db = dataBase::pdo();
		
		if($_SERVER['REMOTE_ADDR']){
			
			$sessIp = $_SERVER['REMOTE_ADDR'];
			$sessionCookie = md5($sessIp.''.rand(0,1000).''.time().''.$userId);
			$sessions = $db->exec("INSERT INTO crm_sessions (session_ip,session_hash,session_status,session_user_id,session_date) VALUES ('{$sessIp}','{$sessionCookie}',1,{$userId},NOW())");
			
			if($sessions){
				$id = $db->lastInsertId();
				return $id;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	
	}
	
}


?>