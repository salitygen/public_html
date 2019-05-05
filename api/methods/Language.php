<?php
defined('EXEC') or die;

class HTML {
	
	public function Name($main,$type,$text){
		
		$langFile = $main->root .'/lang/'.$type.'_'. $main->session->user_lang .'.ini'
		
		if(is_file($langFile)){
			
			$dataIni = parse_ini_file($langFile);
			return $dataIni[strtoupper($text)];
			
		}else{
			
			return $text;
			
		}
		
	}
	
}
?>