<?php
defined('EXEC') or die;

class SystemMessage {
	
	public function set($type,$mess,$main){
		
		$data = new stdClass();
		
		if($type && $type !=''){
			$data->type = $type;
		}
		if($mess && $mess !=''){
			$data->mess = $mess;
		}
		
		if(isset($data->type) && isset($data->mess)){
			$main->sysmessage = $data;
		}
		
	}
	
	public function get($main){
		if(isset($main->sysmessage)){
			return '<p class="'.$main->sysmessage->type.'">'.$main->sysmessage->mess.'<p>';
		}else{
			return false;
		}
	}
	
}

?>