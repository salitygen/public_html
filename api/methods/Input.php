<?php
defined('EXEC') or die;

class Input {

	public function postSanitise($text){
		if(is_array($text)){
			$text = 'Array';
		}
		if(is_object($text)){
			$text = 'Object';
		}
		$text = (string)$text;
		$quotes = array("\x27","\x22","\t");
		$text = htmlspecialchars($text,ENT_QUOTES);
		$text = trim(strip_tags($text));
		$text = str_replace($quotes,'',$text);
		$text = addslashes($text);
		if($text != ''){
			return $text;
		}else{
			return false;
		}
	}
	
	public function getSanitise($text){
		if(is_array($text)){
			$text = 'Array';
		}
		$text = (string)$text;
		$quotes = array("\x27", "\x22", "\x60", "\t", "\n", "\r","*", "%", "<", ">", "?", "!","/",".");
		$repquotes = array('-', '+', '#','"');
		$goodquotes = array("\-", "\+", "\#","&quot;");
		$text = htmlspecialchars($text);
		$text = stripslashes($text);
		$text = trim(strip_tags($text));
		$text = str_replace($quotes,'',$text);
		$text = str_replace($repquotes,$goodquotes,$text);
		if($text != ''){
			return $text;
		}else{
			return false;
		}
	}
	
	public function task(){
		if(isset($_GET['task'])){
			if(!is_array($_GET['task'])){
				if(mb_strlen((string)$_GET['task']) <= 50 && (string)$_GET['task']){
					$task = Input::getSanitise($_GET['task']);
					return $task;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function view(){
		if(isset($_GET['view'])){
			if(!is_array($_GET['view'])){
				if(mb_strlen((string)$_GET['view']) <= 50 && (string)$_GET['view'] != ''){
					$view = Input::getSanitise($_GET['view']);
					return $view;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function getParams(){
		if(isset($_GET['params'])){
			if(!is_array($_GET['params'])){
				if(mb_strlen((string)$_GET['params']) <= 50 && (string)$_GET['params'] != ''){
					$params = Input::getSanitise($_GET['params']);
					return $params;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function general($data){
		
		if(isset($data->phones)){
			$data->phones = Input::validArray($data->phones);
		}else{
			$data->phones = json_encode(array(array('value'=>'','note'=>'')));
		}
		
		if(isset($data->mails)){
			$data->mails = Input::validArray($data->mails);
		}else{
			$data->mails = json_encode(array(array('value'=>'','note'=>'')));
		}
		
		if(isset($data->addres)){
			$data->addres = Input::validArray($data->addres);
		}else{
			$data->addres = json_encode(array(array('value'=>'','note'=>'')));
		}
		
		if(isset($data->general_name)){
			if(!$data->general_name = Input::postSanitise($data->general_name)){
				$data->general_name = '';
			}
		}else{
			$data->general_name = '';
		}
		
		if(isset($data->general_note)){
			if(!$data->general_note = Input::postSanitise($data->general_note)){
				$data->general_note = '';
			}
		}else{
			$data->general_note = '';
		}
		
		if(isset($data->general_status)){
			if($data->general_status === 'on'){
				$data->general_status = 1;
			}else{
				$data->general_status = 0;
			}
		}else{
			$data->general_status = 0;
		}
		
		return $data;
		
	}
	
	public function service($data){
		
		if(isset($data->general_id)){
			$data->general_id = (int)$data->general_id;
			if($data->general_id <= 0){
				$data->general_id = 1;
			}
		}else{
			$data->general_id = 1;
		}
		
		if(isset($data->service_id)){
			$data->service_id = (int)$data->service_id;
			if($data->service_id <= 0){
				$data->service_id = 1;
			}
		}else{
			$data->service_id = 1;
		}
		
		if(isset($data->phones)){
			$data->phones = Input::validArray($data->phones);
		}else{
			$data->phones = json_encode(array(array('value'=>'','note'=>'')));
		}
		
		if(isset($data->mails)){
			$data->mails = Input::validArray($data->mails);
		}else{
			$data->mails = json_encode(array(array('value'=>'','note'=>'')));
		}
		
		if(isset($data->addres)){
			$data->addres = Input::validArray($data->addres);
		}else{
			$data->addres = json_encode(array(array('value'=>'','note'=>'')));
		}
		
		if(isset($data->service_name)){
			if(!$data->service_name = Input::postSanitise($data->service_name)){
				$data->service_name = '';
			}
		}else{
			$data->service_name = '';
		}
		
		if(isset($data->service_note)){
			if(!$data->service_note = Input::postSanitise($data->service_note)){
				$data->service_note = '';
			}
		}else{
			$data->service_note = '';
		}
		
		if(isset($data->service_status)){
			if($data->service_status === 'on'){
				$data->service_status = 1;
			}else{
				$data->service_status = 0;
			}
		}else{
			$data->service_status = 0;
		}
		
		return $data;
		
	}
	
	public function workshop($data){
		
		if(isset($data->service_id)){
			$data->service_id = (int)$data->service_id;
			if($data->service_id <= 0){
				$data->service_id = 1;
			}
		}else{
			$data->service_id = 1;
		}
		
		if(isset($data->workshop_id)){
			$data->workshop_id = (int)$data->workshop_id;
			if($data->workshop_id <= 0){
				$data->workshop_id = 1;
			}
		}else{
			$data->workshop_id = 1;
		}
		
		if(isset($data->phones)){
			$data->phones = Input::validArray($data->phones);
		}else{
			$data->phones = json_encode(array(array('value'=>'','note'=>'')));
		}
		
		if(isset($data->mails)){
			$data->mails = Input::validArray($data->mails);
		}else{
			$data->mails = json_encode(array(array('value'=>'','note'=>'')));
		}
		
		if(isset($data->addres)){
			$data->addres = Input::validArray($data->addres);
		}else{
			$data->addres = json_encode(array(array('value'=>'','note'=>'')));
		}
		
		if(isset($data->workshop_name)){
			if(!$data->workshop_name = Input::postSanitise($data->workshop_name)){
				$data->workshop_name = '';
			}
		}else{
			$data->workshop_name = '';
		}
		
		if(isset($data->workshop_note)){
			if(!$data->workshop_note = Input::postSanitise($data->workshop_note)){
				$data->workshop_note = '';
			}
		}else{
			$data->workshop_note = '';
		}
		
		if(isset($data->workshop_status)){
			if($data->workshop_status === 'on'){
				$data->workshop_status = 1;
			}else{
				$data->workshop_status = 0;
			}
		}else{
			$data->workshop_status = 0;
		}
		
		return $data;
		
	}
	
	public function validArray($data){
		
		$nk = 0;
		$newData = array();
		
		if(is_array($data)){
			$data = array_values($data);
			for($k=0;$k<count($data);$k++){
				$n = 0;
				if(isset($data[$k])){
					if(is_array($data[$k])){	
						for($i=0;$i<count($data[$k]);$i++){
							if(array_keys($data[$k])[$i] == 'value'){
								$newData[$k]['value'] = Input::postSanitise($data[$k]['value']);
								$n++;
							}elseif(array_keys($data[$k])[$i] == 'note'){
								$newData[$k]['note'] = Input::postSanitise($data[$k]['note']);
								$n++;
							}
						}
						if($n != 2){
							$newData[$k] = array('value'=>'','note'=>'');
							if($nk > 0){
								unset($newData[$k]);
							}
							$nk++;
						}
					}else{
						$newData[$k] = array('value'=>'','note'=>'');
					}
				}else{
					$newData[$k] = array('value'=>'','note'=>'');
				}
			}
			
			$newData = array_values($newData);
			return json_encode($newData,JSON_UNESCAPED_UNICODE);
			
		}else{
			
			return json_encode(array(array('value'=>'','note'=>'')));
			
		}

		
	}
	
	
}


?>