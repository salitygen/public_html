<?php
defined('EXEC') or die;

class HTML {
	
	public function Name($main,$type,$text){
		
		$text = strtoupper($text);
		
		$langFile = $main->root .'/lang/'.$type.'_'. $main->session->user_lang .'.ini';
		
		if(!is_file($langFile)){
			
			return $text;
			
		}else{
			
			$dataIni = parse_ini_file($langFile);
			if(isset($dataIni[$text])){
				return $dataIni[$text];
			}else{
				return $text;
			}
			
		}
		
	}
	
}
?>