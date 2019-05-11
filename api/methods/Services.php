<?php
defined('EXEC') or die;

class Service {
	
	public function get($id){
		
		$db = dataBase::pdo();
		$getservice = $db->query("SELECT * FROM crm_services WHERE service_id={$id}");
		$services = $getservice->fetchAll();
		
		if($services){
			foreach($services as $k => $service){
				$services[$k]->mails = json_decode($service->service_mail_json);
				$services[$k]->phones = json_decode($service->service_phone_json);
				$services[$k]->addres = json_decode($service->service_addres_json);
			}
			return $services;
		}else{
			return false;
		}
		
	}
	
	public function getAll(){
		
		$db = dataBase::pdo();
		$getservices = $db->query("SELECT * FROM crm_services");
		$services = $getservices->fetchAll();
		
		if($services){
			foreach($services as $k => $service){
				$services[$k]->mails = json_decode($service->service_mail_json);
				$services[$k]->phones = json_decode($service->service_phone_json);
				$services[$k]->addres = json_decode($service->service_addres_json);
			}
			return $services;
		}else{
			return false;
		}
		
	}
	
	public function add($data){

	}
	
	public function update($data){
		
		$data = Input::service($data);
		$db = dataBase::pdo();

		$updservice = $db->exec("
			UPDATE crm_services SET
			service_name='{$data->service_name}',
			service_status={$data->service_status},
			service_addres_json='{$data->addres}',
			service_phone_json='{$data->phones}',
			service_mail_json='{$data->mails}',
			service_note='{$data->service_note}',
			service_general_id={$data->general_id}
			WHERE service_id={$data->service_id}
		");

		if($updservice){
			return $updservice;
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