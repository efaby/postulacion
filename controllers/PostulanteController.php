<?php
require_once (PATH_MODELS . "/PostulanteModel.php");
require_once (PATH_HELPERS. "/File.php");

/**
 * Controlador de Usuarios
 */
class PostulanteController {
	public function display() {
		$model = new PostulanteModel ();
		$usuario = $model->getUsuario(4);
		$usuario['url_foto_view'] = ($usuario['url_foto']=='')?'default_avatar_male.jpg':$usuario['url_foto'];
		$cursos = $model->getCursos();
		$titulos = $model->getTitulos();
		$historiales = $model->getHistoriales();
		$estados = $model->getEstados();
		$capacidades = $model->getCapacidades();
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
				$provincias = $model->getProvincias($historial['pais_id']);
				$ciudades = $model->getCiudades($historial['provincia_id']);
				require_once "view.form.historial.php";
				break;
		}
		
	}

	public function loadProvincia(){
		$opcion = $_POST ['opcion'];
		$model = new PostulanteModel ();
		$provincias = $model->getProvincias($opcion);
		$html ='<option value="" >Seleccione</option>';
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
		$html ='<option value="" >Seleccione</option>';
		foreach ($ciudades as $dato) {
			$html .='<option value="'.$dato["id"].'" >'.$dato["nombre"].'</option>';
		}
		$html .='</select>';		
		echo $html;
	}
	
	private function uploadFile($nombre){
		$upload = new File();
		return $upload->uploadFile($nombre);
	}
	
	public function downloadFile(){
		$nombre = $_GET['nameFile'];
		$upload = new File();
		return $upload->download($nombre);
	}
	
	public function saveData() {
		$opcion = $_POST ['opcion'];
		$model = new PostulanteModel ();
		$objeto ['id'] = $_POST ['id'];		
		switch ($opcion){
			case 1: $objeto ['nombre'] = $_POST ['nombre'];
					$objeto ['institucion'] = $_POST ['institucion'];
					$objeto ['registro_senecyt'] = $_POST ['registro_senecyt'];		
					$objeto ['nivel_educacion_id'] = $_POST ['nivel_educacion_id'];
					$objeto ['categoria_titulo_id'] = $_POST ['categoria_titulo_id'];
					$objeto ['id_pais'] = $_POST ['id_pais'];
					$table = "titulo";
				break;
			case 2: $$objeto ['nombre'] = $_POST ['nombre'];
					$objeto ['horas'] = $_POST ['horas'];
					$objeto ['anio'] = $_POST ['anio'];	
					$table = "curso";					
				break;
			case 3: $objeto ['institucion'] = $_POST ['institucion'];
					$objeto ['area'] = $_POST ['area'];
					$objeto ['cargo'] = $_POST ['cargo'];	
					$objeto ['telefono'] = $_POST ['telefono'];
					$objeto ['direccion'] = $_POST ['direccion'];
					$objeto ['relacion_docencia'] = $_POST ['relacion_docencia'];
					$objeto ['ciudad_id'] = $_POST ['ciudad_id'];
					$table = "historial";
				break;
		}
		$objeto ['url'] = $this->uploadFile($table);
		$objeto ['postulante_id'] = 4; // poner usuario de sesion
		try {
			$objeto ['id'] = $model->saveData($objeto, $table);
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			$_SESSION ['opcion'] = $opcion;
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
	
	public function deleteData() {
		$opcion = $_GET ['opcion'];
		$model = new PostulanteModel();
		switch ($opcion){
			case 1: $table = 'titulo';
			break;
			case 2: $table = 'curso';
			break;
			case 3: $table = 'historial';
			break;
		}
		try {
			$url = $model->getUrl($table);			
			unlink(PATH_FILES.$url[0]['url']);
			$datos = $model->deleteItem($table);
			$_SESSION ['message'] = "Datos eliminados correctamente.";
			$_SESSION ['opcion'] = $opcion;
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
	
	public function saveFile(){
		$opcion = $_POST ['opcion'];
		$model = new PostulanteModel();		
		switch ($opcion){
			case 1: $field = 'url_foto';
					$prefijo = 'foto';
				break;
			case 2: $field = 'url_cedula';
					$prefijo = 'cedula';
				break;
			case 3: $field = 'url_papeleta';
					$prefijo = 'papeleta';
				break;
			case 4: $field = 'url_hoja';
					$prefijo = 'hoja';
				break;
		}		
		$upload = new File();
		$nombre = $upload->uploadFilePersonal($prefijo,$field);

		$usuario = 4; // poner usuario de sesion
		try {
			$objeto ['id'] = $model->updateFiles($field, $nombre,$usuario);
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			$_SESSION ['opcion'] = 0;
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}

}
