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
							if(array_keys($data[$k])[$i] !== null && !is_array(array_keys($data[$k])[$i]) && !is_object(array_keys($data[$k])[$i])){
								if(array_keys($data[$k])[$i] === 'value'){
									$newData[$k]['value'] = Input::postSanitise($data[$k]['value']);
									$n++;
								}elseif(array_keys($data[$k])[$i] === 'note'){
									$newData[$k]['note'] = Input::postSanitise($data[$k]['note']);
									$n++;
								}
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
						if($n == 0){
							$newData[$k] = array('value'=>'','note'=>'');
							$nk++;
						}
					}
				}else{
					if($n == 0){
						$newData[$k] = array('value'=>'','note'=>'');
						$nk++;
					}
				}
			}
			
			$newData = array_values($newData);
			return json_encode($newData,JSON_UNESCAPED_UNICODE);
			
		}else{
			
			return json_encode(array(array('value'=>'','note'=>'')));
			
		}

		
	}
	
	public function group($data){
		
		if(isset($data->group_id)){
			$data->group_id = (int)Input::postSanitise($data->group_id);
			if($data->group_id == 0){
				die('Error in Data!');
			}
		}else{
			die('Error in Data!');
		}
		
		if(isset($data->group_name)){
			$data->group_name = Input::postSanitise($data->group_name);
		}else{
			$data->group_name = '';
		}
		
		if(isset($data->group_desc)){
			$data->group_desc = Input::postSanitise($data->group_desc);
		}else{
			$data->group_desc = '';
		}
		
		if(isset($data->ch)){
			if(!is_array($data->ch)){
				unset($data->ch);
				$data->ch = array();
			}
		}else{
			$data->ch = array();
		}
		
		$values = array(
			'group_super_users',
			'group_general_see_purchase_price',
			'group_general_set_discounts_in_doc',
			'group_general_specify_the_discount_type',
			'group_general_ask_cost_in_documents',
			'group_general_list_of_managers',
			'group_general_list_of_workers',
			'group_general_company_performance',
			'group_tasks_create',
			'group_tasks_of_workers',
			'group_tasks_see_all',
			'group_tasks_edit_all',
			'group_orders_create',
			'group_orders_moving',
			'group_orders_delete',
			'group_orders_app_manager_worker',
			'group_orders_see_info_customer',
			'group_orders_edit_field_info',
			'group_orders_edit_field_works_materials',
			'group_orders_add_services_price',
			'group_orders_add_new_services_price',
			'group_orders_add_materials_stock',
			'group_orders_add_new_materials_stock',
			'group_orders_edit_price_service',
			'group_orders_edit_price_materials',
			'group_orders_edit_close_order',
			'group_orders_see_all',
			'group_shop_create_sales',
			'group_shop_delete_sales',
			'group_shop_edit_price',
			'group_shop_export_sales',
			'group_tills_make_money',
			'group_tills_move_money',
			'group_tills_spend_money',
			'group_tills_make_move_spend_money_hindsight',
			'group_tills_see_movement_money',
			'group_tills_see_movement_money_all_date',
			'group_tills_delete_transaction',
			'group_tills_print_movement_money',
			'group_tills_export_movement_money',
			'group_tills_see_rest_money',
			'group_tills_add_edit_remove_cash',
			'group_tills_select_workers_list',
			'group_account',
			'group_returns_create',
			'group_returns_delete',
			'group_returns_edit_price',
			'group_storage_tailings',
			'group_storage_posting',
			'group_storage_offs',
			'group_storage_move',
			'group_storage_category',
			'group_storage_add_create_delete',
			'group_storage_delete_operations',
			'group_storage_edit_article_card',
			'group_storage_on_serial_accounting_article',
			'group_storage_export_article',
			'group_storage_import_article',
			'group_contractor_see_customer',
			'group_contractor_see_supplier',
			'group_contractor_edit_card',
			'group_contractor_edit_discount_customer',
			'group_contractor_export_data',
			'group_contractor_import_data',
			'group_reports_data_print',
			'group_reports_data_export',
			'group_reports_data_create_all_date',
			'group_reports_salary',
			'group_reports_money',
			'group_reports_cash_flow',
			'group_reports_profit_orders',
			'group_reports_profit_sales',
			'group_reports_create_orders',
			'group_reports_close_orders',
			'group_reports_work_orders',
			'group_reports_source_orders',
			'group_reports_performers',
			'group_reports_work',
			'group_reports_trade_turnover',
			'group_reports_remains_warehouse',
			'group_reports_offs_warehouse',
			'group_reports_requiring_purchase',
			'group_reports_calls',
			'group_reports_send_sms',
			'group_reports_delayed_sms',
			'group_reports_client_feedback',
			'group_reports_history_login',
			'group_reports_reports_salary_only',
			'group_reports_reports_salary_all',
			'group_settings_general',
			'group_settings_integration',
			'group_settings_workshop',
			'group_settings_service',
			'group_settings_workers',
			'group_settings_statuses',
			'group_settings_groups',
			'group_settings_sale_prices',
			'group_settings_form_designer',
			'group_settings_list_services',
			'group_settings_handbook',
			'group_settings_document_template',
			'group_settings_notification',
			'group_settings_api',
			'group_settings_subscription',
			'group_settings_partner_program'
		);
		
		$data->checkbox = array();
		
		foreach($values as $value){
			if(isset($data->ch[$value])){
				$data->checkbox[$value] = (int)Input::postSanitise($data->ch[$value]);
			}else{
				$data->checkbox[$value] = 0;
			}
		}
		
		unset($data->ch);
		return $data;
		
	}
	
	
}


?>