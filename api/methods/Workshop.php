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
		
		$data = Input::workshop($data);
		$db = dataBase::pdo();

		$updWorkshop = $db->exec("
			UPDATE crm_workshops SET
			workshop_name='{$data->workshop_name}',
			workshop_status={$data->workshop_status},
			workshop_addres_json='{$data->addres}',
			workshop_phone_json='{$data->phones}',
			workshop_mail_json='{$data->mails}',
			workshop_service_id='{$data->service_id}',
			workshop_note='{$data->workshop_note}'
			WHERE workshop_id=1
		");

		if($updWorkshop){
			return $updWorkshop;
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