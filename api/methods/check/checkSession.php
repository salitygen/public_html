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
			$sessionHash = md5($sessIp.''.rand(0,1000).''.time().''.$userId);
			$sessions = $db->exec("INSERT INTO crm_sessions (session_ip,session_hash,session_stat,session_user_id,session_date) VALUES ('{$sessIp}','{$sessionHash}',1,{$userId},NOW())");
			
			if($sessions){
				$sessionId = $db->lastInsertId();
				$session = Session::get($userId,$sessionId);
				Session::setHash($session->session_hash);
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
		$searchUserSession = $db->query("SELECT * FROM crm_sessions WHERE session_hash={$sHash}");
		$sessions = $searchUserSession->fetch();
		
		if($sessions){
			return $sessions;
		}else{
			return false;
		}

	}
	
	public function getHash(){
		if(isset($_SESSION["session_hash"])){
			return $_SESSION["session_hash"];
		}else{
			return false;
		}
	}
	
	public function setHash($sHash){
		$_SESSION["session_hash"] = $sHash;
		return true;
	}
	
}


?>