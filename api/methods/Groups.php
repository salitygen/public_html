<?php
defined('EXEC') or die;

class Groups {
	
	public function get() {
			
		$db = dataBase::pdo();
		$getGroups = $db->query("SELECT * FROM crm_groups");
		$groups = $getGroups->fetch();
		
		if($groups){
			return $groups;
		}else{
			return false;
		}
		
	}
	
/* 	public function getUsers() {

		$db = dataBase::pdo();
		$getUsers = $db->query("SELECT * FROM crm_users");
		$users = $getUsers->fetch();
		
		if($users){
			return $users;
		}else{
			return false;
		}

	} */

	
/* 	public function getAll(){ // TODO
		
		$db = dataBase::pdo();
		$getgenerals = $db->query("SELECT * FROM crm_generals");
		$generals = $getgenerals->fetch();
		
		if($generals){
			return $generals;
		}else{
			return false;
		}
		
	} */
	
	//public function add($data){ // TODO
	//
	//}
	
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
			WHERE general_id=1
		");

		if($updgeneral){
			return $updgeneral;
		}else{
			return false;
		}
	
	}
	
	//public function remove($id){ // TODO
	//
	//}
	
}
?>