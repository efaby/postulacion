<?php
require_once(PATH_PAGINATOR."/paginator.php");
require_once(PATH_MODELS."/AreaModel.php");
/**
 * Controlador de Usuarios
 *
 */
class AreaController {

	public function display(){
		$model = new AreaModel();
		$offset = 1;
		if(isset($_POST['listForm_offset'])){
			$offset = $_POST['listForm_offset'];
		}
		$totalItems = $model->getAreaListCount();
		$paginator = new paginator("listForm", $totalItems, $offset, LIMIT_PAGE);
		$datos = $model->getAreaList($offset, LIMIT_PAGE);
		$message = "";
		require_once "view.listado.php";
	}
	
	public function insertData(){
		$_SESSION['session'] = 2;
		$area =  Array ( 'id' => '' ,'name' => '','description' => '','is_active' => '');	
		$message = "";
		require_once "view.insertar.php";
	}
	
	public function editData(){
		$model = new AreaModel();
		$area = $model->getArea();
		$message = "";
		require_once "view.insertar.php";
	}
	
	public function saveData(){
		$area['id'] = $_POST['id'];
		$area['name'] = $_POST['name'];
		$area['description'] = $_POST['description'];
		$area['is_active'] = 0;
		if(isset( $_POST['is_active'])) {
			$area['is_active'] = $_POST['is_active'];
		}		
		$message = $this->validar($area);
		if($message == ''){
			$model = new AreaModel();
			try {
				$datos = $model->saveArea($area);
				$_SESSION['message'] = "Datos almacenados correctamente.";
			}
			catch (Exception $e){
				$_SESSION['message'] = $e->getMessage();
			}
			header("Location: index.php");
		} else {
			require_once "view.insertar.php";
		}		
	}
	
	public function deleteData(){
		$model = new AreaModel();
		try{
			$datos = $model->deleteArea();		
			$_SESSION['message'] = "Datos eliminados correctamente.";
		}
		catch (Exception $e){
			$_SESSION['message'] = $e->getMessage();
		}
		header("Location: index.php");
	}
	
	private function validar($area){
		$reg_exp_name = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s\.\_\-]+$/";
		$reg_exp_description = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s\.\_\-\,]+$/";
		
		if (($area['name'] == '') or (!preg_match($reg_exp_name, $area['name'])))
		{
			return 'Por favor ingrese en el campo nombre solo letras (a-z) o signos (1-9 -_).';
		}
		
		if (($area['description'] == '') and (!preg_match($reg_exp_description, $area['description'])))
		{
			return 'Por favor ingrese en el campo descripci&oacute;n solo letras (a-z) o signos (1-9 -_).';
		}
		return "";
	}
}
