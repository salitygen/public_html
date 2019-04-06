<?php
defined('EXEC') or die;

class Addres {
	
	public function get($id){
		
		$db = dataBase::pdo();
		$getAddres = $db->query("SELECT * FROM crm_addres WHERE addres_id={$id}");
		$addres = $getAddres->fetch();
		
		if($addres){
			return $addres;
		}else{
			return false;
		}
		
	}
	
	public function getAll(){
		
		$db = dataBase::pdo();
		$getAddreses = $db->query("SELECT * FROM crm_addres");
		$addreses = $getAddreses->fetch();
		
		if($addres){
			return $addreses;
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