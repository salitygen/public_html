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
		return $text;
	}
	
	public function task(){
		if(isset($_GET['task'])){
			if(strlen($_GET['task']) <= 50){
				$task = Input::sanitise($_GET['task']);
				return $task;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function getParams(){
		if(isset($_GET['params'])){
			if(strlen($_GET['params']) <= 50){
				$params = Input::sanitise($_GET['params']);
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