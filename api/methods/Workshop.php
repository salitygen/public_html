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
		
		if(isset($data->phones)){
			$data->phones = json_encode(Input::getSanitise($data->phones));
		}else{
			$data->phones = json_encode(array('value'=>'','note'=>''));
		}
		if(isset($data->mails)){
			$data->mails = json_encode(Input::getSanitise($data->mails));
		}else{
			$data->mails = json_encode(array('value'=>'','note'=>''));
		}
		if(isset($data->addres)){
			$data->addres = json_encode(Input::getSanitise($data->addres));
		}else{
			$data->addres = json_encode(array('value'=>'','note'=>''));
		}
		
		if(isset($data->workshop_name)){
			if(!$data->workshop_name = Input::getSanitise($data->workshop_name)){
				$data->workshop_name = '';
			}
		}else{
			$data->workshop_name = '';
		}
		
		if(isset($data->workshop_note)){
			if(!$data->workshop_note = Input::getSanitise($data->workshop_note)){
				$data->workshop_note = '';
			}
		}else{
			$data->workshop_note = '';
		}

		$data->companyId = (int)$data->companyId;
		$data->company_status = 1;
		
		$db = dataBase::pdo();

		$updWorkshop = $db->exec("
			UPDATE crm_workshops SET
			workshop_name='{$data->workshop_name}',
			workshop_status={$data->company_status},
			workshop_addres_json='{$data->addres}',
			workshop_phone_json='{$data->phones}',
			workshop_mail_json='{$data->mails}',
			workshop_note='{$data->workshop_note}'
			WHERE workshop_id={$data->companyId}
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