<?php
defined('EXEC') or die;

class Rules {
	
	//START Rights by sections | Права по разделам //
	
	// Раздел заявки ( ORDERS ) ==============================================================================
	public function seeOrders($main){
		if(!$main->session->group_super_users){
			if(Rules::ordersCreate($main)						//Может создавать заказы
			||Rules::ordersMoving($main)						//Может перемещать заказы 
			||Rules::ordersDelete($main)						//Может удалять заказы
			||Rules::ordersAppManagerWorker($main)				//Может назначать менеджера и исполнителя в заказ
			||Rules::ordersSeeInfoCustomer($main)				//Может видеть информацию о клиенте	
			||Rules::ordersEditFieldInfo($main)					//Может редактировать поля "Информация о заказе"
			||Rules::ordersEditFieldWorksMaterials($main)		//Может редактировать поля "Работы и материалы"	
			||Rules::ordersAddServicesPrice($main)				//Может добавлять услуги из прейскуранта
			||Rules::ordersAddNewServicesPrice($main)			//Может добавлять услуги которых нет в прейскуранте	
			||Rules::ordersAddMaterialsStock($main)				//Может добавлять материалы со склада	
			||Rules::ordersAddNewMaterialsStock($main)			//Может добавлять материалы которых нет на складе
			||Rules::ordersEditPriceService($main)				//Может редактировать цену услуг	
			||Rules::ordersEditPriceMaterials($main)			//Может редактировать цену материалов
			||Rules::ordersEditCloseOrder($main)				//Может редактировать закрытый заказ
			||Rules::ordersSeeAll($main)){						//Может видеть все заказы
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	// Раздел Задачи ( TASK ) ==================================================================================
	public function seeTask($main){
		if(!$main->session->group_super_users){
			if(Rules::taskСreate($main)							//Может создавать задачи	
			||Rules::taskOfWorkers($main)						//Может быть исполнителем
			||Rules::taskSeeAll($main)							//Может видеть задачи всех сотрудников
			||Rules::taskEditAll($main)){						//Может редактировать задачи всех сотрудников
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	// Раздел Платежи ( PAYMENTS ) ==============================================================================
	public function seePayments($main){
		if(!$main->session->group_super_users){
			if(Rules::seeShop($main)							//Имеет доступ к разделу магазин
			||Rules::seeTills($main)							//Имеет доступ к разделу кассы
			||Rules::seeReturns($main)){						//Имеет доступ к разделу возвраты
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	// Раздел Магазин ( SHOP ) ==================================================================================
	public function seeShop($main){
		if(!$main->session->group_super_users){
			if(Rules::shopCreateSales($main)					//Может создавать продажи
			||Rules::shopDeleteSales($main)						//Может удалять продажи	
			||Rules::shopEditPrice($main)						//Может редактировать цену	
			||Rules::shopExportSales($main)){					//Может экспортировать продажи
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	// Раздел Кассы ( TILLS ) ===================================================================================
	public function seeTills($main){
		if(!$main->session->group_super_users){
			if(Rules::tillsMakeMoney($main)						//Может вносить деньги
			||Rules::tillsMoveMoney($main)						//Может перемещать деньги
			||Rules::tillsSpendMoney($main)						//Может расходовать деньги
			||Rules::tillsMakeMoveSpendHindsightMoney($main)	//Может вносить, перемещать и расходовать деньги задним числом
			||Rules::tillsSeeMovementMoney($main)				//Может видеть движение денег
			||Rules::tillsSeeMovementMoneyAllDate($main)		//Может видеть движение денег за произвольный период дат
			||Rules::tillsDeleteTransaction($main)				//Может удалять операции в кассе
			||Rules::tillsPrintMovementMoney($main)				//Может печатать движение денег
			||Rules::tillsExportMovementMoney($main)			//Может экспортировать движение денег
			||Rules::tillsSeeRestMoney($main)					//Может видеть остаток денег в кассе
			||Rules::tillsAddEditRemoveCash($main)				//Может создавать, редактировать и удалять кассы
			||Rules::tillsSelectWorkersList($main)){			//Может выбирать любого сотрудника из списка
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	// Раздел Возвраты ( RETURNS ) ===============================================================================
	public function seeReturns($main){
		if(!$main->session->group_super_users){
			if(Rules::returnsСreate($main)						//Может создавать возвраты
			||Rules::returnsDelete($main)						//Может удалять возвраты
			||Rules::returnsEditPrice($main)){					//Может редактировать цену возвратов
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	// Раздел Склад ( STORAGE ) ==================================================================================
	public function seeStorage($main){
		if(!$main->session->group_super_users){
			if(Rules::storageTailings($main)					//Может видеть остатки на складе
			||Rules::storagePosting($main)						//Может оприходовать
			||Rules::storageOffs($main)							//Может списовать
			||Rules::storageMove($main)							//Может перемещать
			||Rules::storageCreateCategory($main)				//Может создавать категории
			||Rules::storageAddCreateDelete($main)				//Может создавать, редактировать и удалять склады
			||Rules::storageDeleteOperations($main)				//Может удалять операции на складе
			||Rules::storageEditArticleCard($main)				//Может редактировать карточку товара
			||Rules::storageOnSerialAccountingArticle($main)	//Может включать серийный учет для существующих товаров
			||Rules::storageExportArticle($main)				//Может экспортировать товары
			||Rules::storageImportArticle($main)){				//Может импортировать товары
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	// Раздел Контрагенты ( CONTACTORS ) ==========================================================================
	public function seeContractors($main){
		if(!$main->session->group_super_users){
			if(Rules::contractorsSeeCustomer($main)				//Может видеть покупателей
			||Rules::contractorsSeeSupplier($main)				//Может видеть поставщиков
			||Rules::contractorsEditCard($main)					//Может редактировать карточку контрагента
			||Rules::contractorsEditDiscountCustomer($main)		//Может редактировать персональную скидку клиента
			||Rules::contractorsExportData($main)				//Может экспортировать данные
			||Rules::contractorsImportData($main)){				//Может импортировать данные
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	// Раздел Отчеты ( REPORTS ) =================================================================================
	public function seeReports($main){
		if(!$main->session->group_super_users){
			if(Rules::reportsDataPrint($main)					//Может печатать данные отчета
			||Rules::reportsDataExport($main)					//Может экспортировать данные отчета
			||Rules::reportsDataCreateAllDate($main)			//Может формировать отчет за произвольный период дат
			||Rules::reportsSalary($main)						//Может формировать отчет по зарплате
			||Rules::reportsMoney($main)						//Может формировать отчет ВСЕГО ДЕНЕГ ??? // NEED_REFACTORY
			||Rules::reportsCashFlow($main)						//Может формировать отчет движение денежных средств
			||Rules::reportsProfitOrders($main)					//Может формировать отчет прибыль по заказам
			||Rules::reportsProfitSales($main)					//Может формировать отчет прибыль от продаж
			||Rules::reportsCreateOrders($main)					//Может формировать отчет созданные заказы
			||Rules::reportsCloseOrders($main)					//Может формировать отчет закрытые заказы
			||Rules::reportsWorkOrders($main)					//Может формировать отчет заказы в работе
			||Rules::reportsSourceOrders($main)					//Может формировать отчет откуда о нас узнают
			||Rules::reportsPerformers($main)					//Может формировать отчет по исполнителям
			||Rules::reportsWork($main)							//Может формировать отчет по работам
			||Rules::reportsTradeTurnover($main)				//Может формировать отчет обороты товаров
			||Rules::reportsRemainsWarehouse($main)				//Может формировать отчет остатки на складе
			||Rules::reportsOffsWarehouse($main)				//Может формировать отчет списания со склада
			||Rules::reportsRequiringPurchase($main)			//Может формировать отчет товары требующие закупки	
			||Rules::reportsСalls($main)						//Может формировать отчет по звонкам
			||Rules::reportsSendSms($main)						//Может формировать отчет по отправленным SMS
			||Rules::reportsDelayedSms($main)					//Может формировать отчет по отложенным SMS	
			||Rules::reportsClientFeedback($main)				//Может формировать отчет по отзывам клиентов
			||Rules::reportsHistoryLogin($main)					//Может формировать отчет истории входов в систему
			||Rules::reportsSalaryOnly($main)					//Может формировать отчет по своей зарплате
			||Rules::reportsSalaryAll($main)){					//Может формировать отчет по зарплате других
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	// Раздел Настройки ( SETTINGS ) ============================================================================
	public function seeSettings($main){
		if(!$main->session->group_super_users){
			if(Rules::settingsGeneral($main)					//Имеет доступ к общим настройкам
			||Rules::settingsIntegration($main)					//Имеет доступ к центру интеграций
			||Rules::settingsWorkshop($main)					//Имеет доступ к настройкам мастерских
			||Rules::settingsUsers($main)						//Имеет доступ к настройкам пользователей
			||Rules::settingsGroups($main)						//Имеет доступ к настройкам групп
			||Rules::settingsStatuses($main)					//Имеет доступ к настройкам статусов
			||Rules::settingsRules($main)						//Имеет доступ к настройкам групп
			||Rules::settingsSalePrices($main)					//Имеет доступ к настройкам цен и скидок
			||Rules::settingsFormDesigner($main)				//Имеет доступ к настройкам конструктору форм
			||Rules::settingsListServices($main)				//Имеет доступ к настройкам переченя услуг
			||Rules::settingsHandbook($main)					//Имеет доступ к настройкам справочников
			||Rules::settingsDocumentTemplate($main)			//Имеет доступ к настройкам шаблонов документов
			||Rules::settingsNotification($main)				//Имеет доступ к настройкам оповещения
			||Rules::settingsApi($main)							//Имеет доступ к настройкам API
			||Rules::settingsSubscription($main)				//Имеет доступ к настройкам подписки
			||Rules::settingsPartnerProgram($main)){			//Имеет доступ к настройкам партнерской программы
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	
	//END   Rights by sections | Права по разделам //
	
	//START =========== Global | Глобальное  ===== //
	
	// Может ли видеть закупочную цену товаров
	public function seePurchasePrice($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_general_see_purchase_price){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли задавать скидки в документах
	public function setDiscountsInDoc($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_general_set_discounts_in_doc){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли указывать тип скидки
	public function setDiscountSpecifyType($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_general_specify_the_discount_type){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли задавать себестоимость в документах
	public function setAskCostDocuments($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_general_ask_cost_in_documents){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Отображать ли сотрудника в списке менеджеров // ?
	public function listOfManagers($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_general_list_of_managers){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Отображать ли сотрудника в списке исполнителей // ?
	public function listOfWorkers($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_general_list_of_workers){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Отображать ли показатели компании
	public function showCompanyPerformance($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_general_company_performance){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END ============= Global | Глобальное  ===== //
	
	//START ============= Task | Задачи  ========= //
	
	//Может ли создавать задачи	
	public function taskСreate($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tasks_create){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли быть исполнителем // ?
	public function taskOfWorkers($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tasks_of_workers){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли видеть задачи всех сотрудников
	public function taskSeeAll($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tasks_see_all){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать задачи всех сотрудников
	public function taskEditAll($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tasks_edit_all){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END =============== Task | Задачи  ========= //
	
	//START =========== Orders | Заказы  ========= //
	
	//Может ли создавать заказы
	public function ordersCreate($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_create){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли перемещать заказы
	public function ordersMoving($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_moving){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли удалять заказы
	public function ordersDelete($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_delete){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли назначать менеджера и исполнителя в заказ
	public function ordersAppManagerWorker($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_app_manager_worker){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли видеть информацию о клиенте	
	public function ordersSeeInfoCustomer($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_see_info_customer){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать поля "Информация о заказе"	
	public function ordersEditFieldInfo($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_edit_field_info){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать поля "Работы и материалы"	
	public function ordersEditFieldWorksMaterials($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_edit_field_works_materials){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли добавлять услуги из прейскуранта	
	public function ordersAddServicesPrice($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_add_services_price){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли добавлять услуги которых нет в прейскуранте	
	public function ordersAddNewServicesPrice($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_add_new_services_price){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли добавлять материалы со склада	
	public function ordersAddMaterialsStock($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_add_materials_stock){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли добавлять материалы которых нет на складе	
	public function ordersAddNewMaterialsStock($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_add_new_materials_stock){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать цену услуг	
	public function ordersEditPriceService($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_edit_price_service){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать цену материалов	
	public function ordersEditPriceMaterials($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_edit_price_materials){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать закрытый заказ	
	public function ordersEditCloseOrder($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_edit_close_order){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли видеть все заказы	
	public function ordersSeeAll($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_orders_see_all){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END ============= Orders | Заказы  ========= //
	
	//START ============= Shop | Магазин  ======== //
	
	//Может ли создавать продажи	
	public function shopCreateSales($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_shop_create_sales){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли удалять продажи	
	public function shopDeleteSales($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_shop_delete_sales){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать цену	
	public function shopEditPrice($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_shop_edit_price){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли экспортировать продажи	
	public function shopExportSales($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_shop_export_sales){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END =============== Shop | Магазин  ======== //

	//START ============ Tills | Кассы  ========== //
	
	//Может ли вносить деньги	
	public function tillsMakeMoney($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_make_money){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли перемещать деньги
	public function tillsMoveMoney($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_move_money){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли расходовать деньги
	public function tillsSpendMoney($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_spend_money){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли вносить, перемещать и расходовать деньги задним числом
	public function tillsMakeMoveSpendHindsightMoney($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_make_move_spend_money_hindsight){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли видеть движение денег
	public function tillsSeeMovementMoney($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_see_movement_money){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли видеть движение денег за произвольный период дат
	public function tillsSeeMovementMoneyAllDate($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_see_movement_money_all_date){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли удалять операции в кассе
	public function tillsDeleteTransaction($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_delete_transaction){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли печатать движение денег
	public function tillsPrintMovementMoney($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_print_movement_money){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли экспортировать движение денег
	public function tillsExportMovementMoney($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_export_movement_money){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли видеть остаток денег в кассе
	public function tillsSeeRestMoney($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_see_rest_money){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли создавать, редактировать и удалять кассы
	public function tillsAddEditRemoveCash($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_add_edit_remove_cash){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли выбирать любого сотрудника из списка
	public function tillsSelectWorkersList($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_tills_select_workers_list){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END ============== Tills | Кассы  ========== //
	
	//START =========  Account | Счета  ========== //
	
	//Может ли работать со счетами 
	public function account($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_account){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END =========    Account | Счета  ========== //
	
	//START =========  Returns | Возвраты  ======= //
	
	//Может ли создавать возвраты
	public function returnsСreate($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_returns_create){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли удалять возвраты
	public function returnsDelete($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_returns_delete){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать цену возвратов
	public function returnsEditPrice($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_returns_edit_price){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END =========    Returns | Возвраты  ======= //
	
	//START =========  Storage | Склад  ========== //
	
	//Может ли видеть остатки на складе
	public function storageTailings($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_tailings){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли оприходовать
	public function storagePosting($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_posting){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли списовать
	public function storageOffs($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_offs){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли перемещать
	public function storageMove($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_move){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли создавать категории
	public function storageCreateCategory($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_category){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли создавать, редактировать и удалять склады
	public function storageAddCreateDelete($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_add_create_delete){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли удалять операции на складе
	public function storageDeleteOperations($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_delete_operations){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать карточку товара
	public function storageEditArticleCard($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_edit_article_card){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли включать серийный учет для существующих товаров
	public function storageOnSerialAccountingArticle($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_on_serial_accounting_article){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли экспортировать товары
	public function storageExportArticle($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_export_article){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли импортировать товары
	public function storageImportArticle($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_storage_import_article){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END ===========  Storage | Склад  ========== //
	
	//START ====== Сontractors | Контрагенты ===== //
	
	//Может ли видеть покупателей
	public function contractorsSeeCustomer($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_contractor_see_customer){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли видеть поставщиков
	public function contractorsSeeSupplier($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_contractor_see_supplier){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать карточку контрагента
	public function contractorsEditCard($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_contractor_edit_card){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли редактировать персональную скидку клиента
	public function contractorsEditDiscountCustomer($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_contractor_edit_discount_customer){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли экспортировать данные
	public function contractorsExportData($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_contractor_export_data){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли импортировать данные
	public function contractorsImportData($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_contractor_import_data){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}

	//END ======== Сontractors | Контрагенты ===== //
	
	//START ========== Reports | Отчеты ========== //
	
	//Может ли печатать данные отчета
	public function reportsDataPrint($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_data_print){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли экспортировать данные отчета
	public function reportsDataExport($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_data_export){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет за произвольный период дат
	public function reportsDataCreateAllDate($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_data_create_all_date){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет по зарплате
	public function reportsSalary($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_salary){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет ВСЕГО ДЕНЕГ ??? // NEED_REFACTORY
	public function reportsMoney($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_money){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет движение денежных средств
	public function reportsCashFlow($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_cash_flow){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет прибыль по заказам
	public function reportsProfitOrders($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_profit_orders){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет прибыль от продаж
	public function reportsProfitSales($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_profit_sales){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет созданные заказы
	public function reportsCreateOrders($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_create_orders){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет закрытые заказы
	public function reportsCloseOrders($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_close_orders){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет заказы в работе
	public function reportsWorkOrders($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_work_orders){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет откуда о нас узнают
	public function reportsSourceOrders($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_source_orders){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет по исполнителям
	public function reportsPerformers($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_performers){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет по работам
	public function reportsWork($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_work){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет обороты товаров
	public function reportsTradeTurnover($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_trade_turnover){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет остатки на складе
	public function reportsRemainsWarehouse($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_remains_warehouse){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет списания со склада
	public function reportsOffsWarehouse($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_offs_warehouse){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет товары требующие закупки	
	public function reportsRequiringPurchase($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_requiring_purchase){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет по звонкам
	public function reportsСalls($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_calls){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет по отправленным SMS
	public function reportsSendSms($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_send_sms){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет по отложенным SMS
	public function reportsDelayedSms($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_delayed_sms){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет по отзывам клиентов	
	public function reportsClientFeedback($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_client_feedback){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет истории входов в систему
	public function reportsHistoryLogin($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_history_login){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет по своей зарплате
	public function reportsSalaryOnly($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_reports_salary_only){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Может ли формировать отчет по зарплате других
	public function reportsSalaryAll($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_reports_reports_salary_all){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END ============ Reports | Отчеты ========== //
	
	//START ========= Settings | Настройки ======= //
	
	//Имеет ли доступ к общим настройкам
	public function settingsGeneral($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_general){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к центру интеграций
	public function settingsIntegration($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_integration){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам мастерских
	public function settingsWorkshop($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_workshop){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам групп	
	public function settingsGroups($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_groups){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам пользователей
	public function settingsUsers($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_users){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам статусов	
	public function settingsStatuses($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_statuses){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам групп	
	public function settingsRules($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_rules){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам цен и скидок
	public function settingsSalePrices($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_sale_prices){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам конструктору форм
	public function settingsFormDesigner($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_form_designer){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам переченя услуг
	public function settingsListServices($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_list_services){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам справочников
	public function settingsHandbook($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_handbook){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам шаблонов документов
	public function settingsDocumentTemplate($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_document_template){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам оповещения
	public function settingsNotification($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_notification){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам API
	public function settingsApi($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_api){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам подписки
	public function settingsSubscription($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_subscription){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//Имеет ли доступ к настройкам партнерской программы
	public function settingsPartnerProgram($main){
		if(!$main->session->group_super_users){
			if(!$main->session->group_settings_partner_program){
				return false;
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
	
	//END =========== Settings | Настройки ======= //
}

?>						
