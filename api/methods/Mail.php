<?php
defined('EXEC') or die;

class Mails {
	
	public function get($id){
		
		$db = dataBase::pdo();
		$getMail = $db->query("SELECT * FROM crm_mails WHERE mail_id={$id}");
		$mail = $getMail->fetch();
		
		if($mail){
			return $mail;
		}else{
			return false;
		}
		
	}
	
	public function getAll(){
		
		$db = dataBase::pdo();
		$getMails = $db->query("SELECT * FROM crm_mails");
		$mails = $getMails->fetch();
		
		if($mails){
			return $mails;
		}else{
			return false;
		}
		
	}
	
	public function add($data){
		//if(Rules::settingsWorkshop($main)){
			
		//}
	}
	public function update($id,$data){
		//if(Rules::settingsWorkshop($main)){
			
		//}
	}
	public function block($id){
		//if(Rules::settingsWorkshop($main)){
			
		//}
	}
	public function remove($id){
		//if(Rules::settingsWorkshop($main)){
			
		//}
	}
	
}
?>