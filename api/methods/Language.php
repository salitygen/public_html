<?php
defined('EXEC') or die;

class HTML {
	
	public function Name($main,$type,$text){
		
		$dataIni = parse_ini_file($main->root .'/lang/'.$type.'_'. $main->session->user_lang .'.ini');
		return $dataIni[strtoupper($text)];
		
	}
	
}
?>