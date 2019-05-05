<?php
defined('EXEC') or die;

class HTML {
	
	public function Name($main,$type,$text,$upper = true){
		
		$dataIni = parse_ini_file($main->root .'/lang/'.$type.'_'. $main->lang .'.ini');
		if($upper === true){
			return $dataIni[strtoupper($text)];
		}else{
			return $dataIni[$text];
		}
		
	}
	
}
?>