<?php
defined('EXEC') or die;

class Workshop {
	
	public function get($id){
		
		$db = dataBase::pdo();
		$getWorkshop = $db->query("SELECT * FROM crm_workshops WHERE workshop_id={$id}");
		$workshop = $getWorkshop->fetch();
		
		if($workshop){
			$workshop->mails = json_decode($workshop->workshop_mail_json);
			$workshop->phones = json_decode($workshop->workshop_phone_json);
			$workshop->addres = json_decode($workshop->workshop_addres_json);
			return $workshop;
		}else{
			return false;
		}
		
	}
	
	public function getAll(){
		
		$db = dataBase::pdo();
		$getWorkshops = $db->query("SELECT * FROM crm_workshops");
		$workshops = $getWorkshops->fetch();
		
		if($workshops){
			return $workshops;
		}else{
			return false;
		}
		
	}
	
	public function add($data){

	}
	
	public function update($data){
		
		$data->phones = json_encode($data->phones);
		$data->mails = 	json_encode($data->mails);
		$data->addres = json_encode($data->addres);
		$data->workshop_name = (string)$data->workshop_name;
		$data->workshop_note = (string)$data->workshop_note;
		$data->companyId = (int)$data->companyId;
		$int = 1;
		
		$db = dataBase::pdo();
		
		$updWorkshops = $db->query("
			UPDATE crm_workshops SET
			workshop_name='{$data->workshop_name}',
			workshop_status={$int},
			workshop_addres_json='{$data->addres}',
			workshop_phone_json='{$data->phones}',
			workshop_mail_json='{$data->mails}',
			workshop_note='{$data->workshop_note}'
			WHERE workshop_id={$data->companyId}
		");
		
		$workshops = $updWorkshops->fetch();
		var_dump($workshops);
		if($workshops){
			return $workshops;
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