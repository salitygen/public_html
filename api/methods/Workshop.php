<?php
defined('EXEC') or die;

class Workshop {
	
	public function get($id){
		
		$db = dataBase::pdo();
		$getWorkshop = $db->query("SELECT * FROM crm_workshops WHERE workshop_id={$id}");
		$workshop = $getWorkshop->fetch();
		
		if($workshop){
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
	
	public function update($id,$data){

	}
	
	public function block($id){

	}
	
	public function remove($id){

	}
	
}
?>