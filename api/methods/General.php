<?php
defined('EXEC') or die;

class General {
	
	public function get($id){
		
		$db = dataBase::pdo();
		$getgeneral = $db->query("SELECT * FROM crm_generals WHERE general_id={$id}");
		$general = $getgeneral->fetch();
		
		if($general){
			$general->mails = json_decode($general->general_mail_json);
			$general->phones = json_decode($general->general_phone_json);
			$general->addres = json_decode($general->general_addres_json);
			return $general;
		}else{
			return false;
		}
		
	}
	
	public function getAll(){
		
		$db = dataBase::pdo();
		$getgenerals = $db->query("SELECT * FROM crm_generals");
		$generals = $getgenerals->fetch();
		
		if($generals){
			return $generals;
		}else{
			return false;
		}
		
	}
	
	public function add($data){

	}
	
	public function update($data){
		
		$data = Input::general($data);
		$db = dataBase::pdo();

		$updgeneral = $db->exec("
			UPDATE crm_generals SET
			general_name='{$data->general_name}',
			general_status={$data->general_status},
			general_addres_json='{$data->addres}',
			general_phone_json='{$data->phones}',
			general_mail_json='{$data->mails}',
			general_note='{$data->general_note}'
			WHERE general_id={$data->companyId}
		");

		if($updgeneral){
			return $updgeneral;
		}else{
			return false;
		}
	
	}
	
	public function block($id){

	}
	
	public function remove($id){

	}
	
}
?>