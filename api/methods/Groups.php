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
		
		$db = dataBase::pdo();
		$data = Input::group($data);
		$queryString = '';
		
		foreach($data->checkbox as $key => $value){
			$queryString .= $key.' = '.$value.',';
		}
		
		$updgroup = $db->exec("UPDATE crm_groups SET 
		group_service_id = {$data->group_service_id},
		group_name = '{$data->group_name}', {$queryString} 
		group_desc = '{$data->group_desc}' WHERE group_id = {$data->group_id}");
		
		if($updgroup){
			return $updgroup;
		}else{
			return false;
		}
		
	}
	

	
	public function remove($id){
	
	}
	
}
?>