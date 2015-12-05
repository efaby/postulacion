<?php
require_once (PATH_PAGINATOR . "/paginator.php");
require_once (PATH_MODELS . "/PostulanteModel.php");
/**
 * Controlador de Usuarios
 */
class PostulanteController {
	public function display() {
		$model = new PostulanteModel ();
		//$datos = $model->getUsuarioList (); // cargar datos de pestañas
		$datos = array();
		$message = "";
		require_once "view.listado.php";
	}
	
	public function loadForm() {
		$opcion = $_GET['opcion'];
		$model = new PostulanteModel ();
		$message = "";
		$paises = $model->getPaises();
		switch ($opcion){
			case 1: $titulo = $model->getTitulo();
				
				$niveles = $model->getNiveles();
				$categorias = $model->getCategorias();
				require_once "view.form.titulo.php";
				break;
			case 2: $curso = $model->getCurso();
				require_once "view.form.curso.php";
				break;
			case 3: $historial = $model->getHistorial();
				$provinicias = $model->getProvincias(0);
				$ciudades = $model->getCiudades(0);
				require_once "view.form.historial.php";
				break;
		}
		
	}

public function loadProvincia(){
		$opcion = $_POST ['opcion'];
		$model = new PostulanteModel ();
		$provincias = $model->getProvincias($opcion);
		$html .='<option value="" >Seleccione</option>';
			foreach ($provincias as $dato) { 
				$html .='<option value="'.$dato["id"].'" >'.$dato["nombre"].'</option>';
					}		
		$html .='</select>';
		
		echo $html;
	}
	
	public function loadCiudad(){
		$opcion = $_POST ['opcion'];
		$model = new PostulanteModel ();
		$ciudades = $model->getCiudades($opcion);		
		$html .='<option value="" >Seleccione</option>';
		foreach ($ciudades as $dato) {
			$html .='<option value="'.$dato["id"].'" >'.$dato["nombre"].'</option>';
		}
		$html .='</select>';		
		echo $html;
	}
	
	
	
	public function saveData() {
		
		print("llego");
		exit();
		$usuario ['id'] = $_POST ['id'];
		$usuario ['numero_identificacion'] = $_POST ['numero_identificacion'];
		$usuario ['nombres'] = $_POST ['nombres'];
		$usuario ['apellidos'] = $_POST ['apellidos'];
		$usuario ['genero'] = $_POST ['genero'];
		$usuario ['tipo_usuario_id'] = $_POST ['tipo_usuario_id'];
		$usuario ['capacidad_especial_id'] = $_POST ['capacidad_especial_id'];
		$usuario ['password'] = $_POST ['password'];
		$usuario ['email'] = $_POST ['email'];
		$usuario ['estado_civil_id'] = $_POST ['estado_civil_id'];
		
		$model = new UsuarioModel ();
		try {
			$datos = $model->saveUsuario ( $usuario );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
	
	public function deleteData() {
		$model = new UsuarioModel();
		try {
			$datos = $model->deleteUsuario ();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}

}
