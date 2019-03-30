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
			$sessionHash = md5(session_id().''.$sessionCookie);
			$sessions = $db->exec("INSERT INTO crm_sessions (session_ip,session_hash,session_stat,session_user_id,session_date) VALUES ('{$sessIp}','{$sessionHash}',1,{$userId},NOW())");
			
			if($sessions){
				$sessionId = $db->lastInsertId();
				$session = Session::get($userId,$sessionId);
				Session::setHash($sessionCookie);
				return $session;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	
	}
	
	public function check($sHash){
		
		$db = dataBase::pdo();
		$sHash = md5(session_id().''.$sHash);
		$searchUserSession = $db->query("SELECT * FROM crm_sessions WHERE session_hash='{$sHash}'");
		$sessions = $searchUserSession->fetch();
		
		if($sessions){
			return $sessions;
		}else{
			return false;
		}

	}
	
	public function getHash(){
		if(isset($_COOKIE["session"])){
			return $_COOKIE["session"];
		}else{
			return false;
		}
	}
	
	public function setHash($sHash){
		setcookie("session",$sHash);
		return true;
	}
	
}


?>