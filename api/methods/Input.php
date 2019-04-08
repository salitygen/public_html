<?php
defined('EXEC') or die;

class Input {

	public function sanitise($text){
		$quotes = array("\x27", "\x22", "\x60", "\t", "\n", "\r");
		$goodquotes = array('-', '+', '#','"',"*", "%", "<", ">", "?", "!");
		$repquotes = array("\-", "\+", "\#","&quot;","\*","\%","\<","\>","\?","\!");
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
	
	public function getSanitise($text){
		$quotes = array("\x27", "\x22", "\x60", "\t", "\n", "\r","*", "%", "<", ">", "?", "!","/",".");
		$goodquotes = array('-', '+', '#','"');
		$repquotes = array("\-", "\+", "\#","&quot;");
		if(is_array($text)){
			$text = 'Array';
		}
		$text = (string)$text;
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
			if(strlen($_GET['task']) <= 50){
				$task = Input::getSanitise($_GET['task']);
				return $task;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function view(){
		if(isset($_GET['view'])){
			if(strlen($_GET['view']) <= 50 && $_GET['view'] != ''){
				$view = Input::getSanitise($_GET['view']);
				return $view;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function getParams(){
		if(isset($_GET['params'])){
			if(strlen($_GET['params']) <= 50 && $_GET['params'] != ''){
				$params = Input::getSanitise($_GET['params']);
				return $params;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function company($data){
		
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
		if($data->companyId <= 0){
			$data->companyId = 0;
		}
		
		$data->company_status = 1;
		
		return $data;
		
	}
	
	public function validArray($data){
		$nk = 0;
		$newData = array();
		$data = array_values($data);
		for($k=0;$k<count($data);$k++){
			$n = 0;
			foreach($data[$k] as $i => $value){
				if($i === 'value'){
					$newData[$k]['value'] = Input::getSanitise($value);
					$n++;
				}elseif($i === 'note'){
					$newData[$k]['note'] = Input::getSanitise($value);
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
		}
		
		$newData = array_values($newData);
		
		return json_encode($newData,JSON_UNESCAPED_UNICODE);
		
	}
	
	
}


?>