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
	
}


?>