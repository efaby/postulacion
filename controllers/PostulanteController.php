<?php
require_once (PATH_MODELS . "/PostulanteModel.php");
require_once (PATH_HELPERS. "/File.php");

/**
 * Controlador de Usuarios
 */
class PostulanteController {
	public function display() {
		$model = new PostulanteModel ();
		$usuario = $model->getUsuario($_SESSION['SESSION_USER']['id']);	
		
		$usuario['url_foto_view'] = ($usuario['url_foto']=='')?'default_avatar_male.jpg':$usuario['url_foto'];
		$usuario['url_cedula'] = ($usuario['url_cedula']=='')?'avatar/default_avatar_file.gif':$usuario['url_cedula'];
		$usuario['url_papeleta'] = ($usuario['url_papeleta']=='')?'avatar/default_avatar_file.gif':$usuario['url_papeleta'];
		$usuario['url_hoja_descargar'] = ($usuario['url_hoja']=='')?'avatar/default_avatar_file.gif':$usuario['url_hoja'];
		$usuario['url_hoja'] = 'avatar/default_avatar_file.gif';
		$cursos = $model->getCursos($_SESSION['SESSION_USER']['id']);
		$titulos = $model->getTitulos($_SESSION['SESSION_USER']['id']);
		$historiales = $model->getHistoriales($_SESSION['SESSION_USER']['id']);
		$estados = $model->getEstados();
		$capacidades = $model->getCapacidades();
		$paises = $model->getPaises();
		
		if($usuario['ciudad']!= ''){
			$provincias = $ciudades = array(array('id' =>$usuario['ciudad'], 'nombre' => $usuario['ciudad']));
			$usuario['pais_id'] = $usuario['ciudad_id'];
			$usuario['provincia_id'] = $usuario['ciudad'];
			$usuario['ciudad_id'] = $usuario['ciudad'];
		} else {			
			$provincias = ($usuario['pais_id']>0)?$model->getProvincias($usuario['pais_id']):array();
			$ciudades = ($usuario['provincia_id']>0)?$model->getCiudades($usuario['provincia_id']):array();
		}
		
		
		
		
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
				if($historial['ciudad']!= ''){
					$provincias = $ciudades = array(array('id' =>$historial['ciudad'], 'nombre' => $historial['ciudad']));
					$historial['pais_id'] = $historial['ciudad_id'];
					$historial['provincia_id'] = $historial['ciudad'];
					$historial['ciudad_id'] = $historial['ciudad'];
				} else {			
					$provincias = $model->getProvincias($historial['pais_id']);
					$ciudades = $model->getCiudades($historial['provincia_id']);
				}
				require_once "view.form.historial.php";
				break;
		}
		
	}

	public function loadProvincia(){
		$opcion = $_POST ['opcion'];
		$model = new PostulanteModel ();
		$provincias = $model->getProvincias($opcion);
		if(count($provincias)>0){
			$html ='<option value="" >Seleccione</option>';
			foreach ($provincias as $dato) { 
				$html .='<option value="'.$dato["id"].'" >'.$dato["nombre"].'</option>';
					}		
			$html .='</select>';
			$resultado = array('band'=>1,'data'=>$html);
		} else {
			$pais = $model->getPais($opcion);
			$html ='<option value="'.$pais['nombre'].'" >'.$pais['nombre'].'</option>';
			$resultado = array('band'=>0,'data'=>$html);
		}
		
		
		echo json_encode($resultado);
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
			case 2: $objeto ['nombre'] = $_POST ['nombre'];
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
					if(is_numeric($_POST ['ciudad_id'])){
						$objeto ['ciudad_id'] = $_POST ['ciudad_id'];
						$objeto ['ciudad'] = '';
					} else {
					
						$objeto ['ciudad_id'] = $_POST ['pais_id'];
						$objeto ['ciudad'] = $_POST ['ciudad_id'];
					}
					
					$table = "historial";
				break;
		}
		$objeto ['url'] = $this->uploadFile($table);
		$objeto ['postulante_id'] = $_SESSION['SESSION_USER']['id']; // poner usuario de sesion
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

		$usuario = $_SESSION['SESSION_USER']['id']; // poner usuario de sesion
		try {
			$objeto ['id'] = $model->updateFiles($field, $nombre,$usuario);
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			$_SESSION ['opcion'] = 0;
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
	
	public function saveUser(){
		$usuario['id'] = $_POST ['id'];
		$usuario['nombres'] = $_POST ['nombres'];
		$usuario['apellidos'] = $_POST ['apellidos'];
		$usuario['numero_identificacion'] = $_POST ['numero_identificacion'];
		$usuario['genero'] = $_POST ['genero'];
		$usuario['capacidad_especial_id'] = $_POST ['capacidad_especial_id'];
		$usuario['estado_civil_id'] = $_POST ['estado_civil_id'];
		$usuario['email'] = $_POST ['email'];
		
		if(is_numeric($_POST ['ciudad_id'])){
			$usuario ['ciudad_id'] = $_POST ['ciudad_id'];
			$usuario ['ciudad'] = '';
		} else {
					
			$usuario ['ciudad_id'] = $_POST ['pais_id'];
			$usuario ['ciudad'] = $_POST ['ciudad_id'];
		}
		
		//$usuario['ciudad_id'] = $_POST ['ciudad_id'];
		$usuario['direccion'] = $_POST ['direccion'];
		$usuario['religion'] = $_POST ['religion'];
		$usuario['idiomas'] = $_POST ['idiomas'];
		$usuario['descripcion_discapacidad'] = $_POST ['descripcion_discapacidad'];
		$usuario['fecha_nacimiento'] = $_POST ['fecha_nacimiento'];
		$usuario['telefono'] = $_POST ['telefono'];
		$usuario['celular'] = $_POST ['celular'];
		
		$model = new PostulanteModel();
		try {
			$usuario['id'] = $model->saveData($usuario, 'usuario');
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			$_SESSION ['opcion'] = 0;
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
		
		
	}
}
