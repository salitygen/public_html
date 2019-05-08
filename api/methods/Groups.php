<?php
defined('EXEC') or die;

class Groups {
	
	public function get($id) {
			
		$db = dataBase::pdo();
		$getGroups = $db->query("SELECT * FROM crm_groups WHERE group_id={$id}");
		$groups = $getGroups->fetch();
		
		if($groups){
			return $groups;
		}else{
			return false;
		}
		
	}
	
	public function getAll(){
		
		$db = dataBase::pdo();
		$getGroups = $db->query("SELECT * FROM crm_groups");
		$groups = $getGroups->fetch();
		
		if($groups){
			return $groups;
		}else{
			return false;
		}

	}
	
	public function add($data){
	
	}
	
	public function update($data){
	
	}
	
	public function remove($id){
	
	}
	
}
?>