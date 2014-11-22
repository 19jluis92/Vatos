<?php
require('controllers/Controller.php');

/**
* 
*/
class InventaryController extends Controller
{
	private $model;
	function __construct()
	{
		parent::__construct();
		
	}

	 function run(){
	 	$view = isset($_GET['view'])?$_GET['view']:'index';
		switch($view)
		{
			case 'index':
			            $this->all();
			break;
			case 'create':
						//Validate User and permissions
						$this->create();		
						break;
			case 'edit':
						//Validate User and permissions
						$this->edit();
						break;
			case 'delete':
						//Validate User and permissions
						$this->delete();
						break;
				default:
						break;

		}
	 }
	public function all(){

	}

	public function edit(){

	}

	public function delete(){
		
	}

	public function create(){

		if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
			$result=false;	
			if($result)
			{
				unset($postError);
				header("Location: index.php?controller=Inspection&view=details&id=$result->id");
				//$this->all();
			}
			else
			{
				$postError = true;
				$this->smarty->assign('error',$result);
			}

		} 
		if($_SERVER['REQUEST_METHOD'] === 'GET' || isset($postError)){
			
			$this->loadProperties();
			//$this->smarty->assign('Clients',$this->toAssociativeArray($this->Client->all()));	
			$this->smarty->display('./views/Inventary/add.tpl');
		}
	}	

	private function loadProperties(){
		require('models/ClientModel.php');
		$this->Client = new ClientModel();
		
		
	}
}