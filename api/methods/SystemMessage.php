<?php
defined('EXEC') or die;

class SystemMessage {
	
	public function set($type,$mess){
		if($type && $type !=''){
			$main->sysmessage->type = $type;
		}
		if($mess && $mess !=''){
			$main->sysmessage->mess = $mess;
		}
	}
	
	public function get(){
		if(isset($main->sysmessage)){
			return '<p class="'.$main->sysmessage->type.'">"'.$main->sysmessage->mess.'"<p>';
		}else{
			return false;
		}
	}
	
}

?>