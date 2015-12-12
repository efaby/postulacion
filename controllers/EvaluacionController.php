<?php
require_once (PATH_MODELS . "/EvaluacionModel.php");
/**
 * Controlador de Usuarios
 */
class EvaluacionController {
	public function display() {
		$_SESSION['session'] = 2;
		$model = new EvaluacionModel();
		$evaluacion =  Array ( 'id' => '' ,'curso' => '','nombre_docente' => '','fecha' => '','asignatura' => '','tema' => '','nombre_observador' => '', 'periodo_academico' => '','fortalezas' =>'', 'debilidades' =>'', 'observaciones' =>'');
		$preguntas = $model->getPreguntas();
		$message = "";
		require_once "view.listado.php";
	}
	
	public function saveData() {
		
		$contador = $_POST ['contador'];
		$total = 0;
		$porcentaje = round(10/$contador, 2);
		$porcentaje1 = round($porcentaje /3, 2);
		$porcentaje2 = round($porcentaje1*2,2);
		for ($value = 1; $value <= $contador; $value++)
		{	
			if ($_POST ['respuesta'.$value] == 1)
			{
				$total= $total+$porcentaje1;
				$respuesta['valor'] = $porcentaje1;
			}
			if ($_POST ['respuesta'.$value] == 2)
			{
				$total= $total+$porcentaje2;
				$respuesta['valor'] = $porcentaje2;
			}
			if ($_POST ['respuesta'.$value] == 3)
			{
				$total= $total+$porcentaje1;
				$respuesta['valor'] = $porcentaje;
			}
			$respuesta['pregunta_id'] =  $_POST['pregunta'.$value];			
		}
		
		$evaluacion['valor'] = $total;
		$evaluacion['observaciones'] = $_POST['observaciones'];
		$evaluacion['fecha_evaluacion'] = $_POST['fecha_evaluacion'];
		$evaluacion['etapa_id'] = 3;
		$evaluacion['postulacion_id'] = 6;//Cambiar
		//$evaluacion['id_usuario'] = $_SESSION['SESSION_USER']['id']; 
		$evaluacion['id_usuario'] = 4;//Cambiar
		$evaluacion['activo'] = 1;
		if ($total >=9)
		{
			$evaluacion['aprobado'] = 1;
		}
		else
		{
			$evaluacion['aprobado'] = 0;
		}
		
		$desempenio['curso'] = $_POST['curso'];
		$desempenio['fecha_evaluacion'] = $_POST['fecha_evaluacion'];
		$desempenio ['asignatura'] = $_POST['asignatura'];
		$desempenio ['tema'] = $_POST['tema'];
		$desempenio ['periodo_academico'] = $_POST['periodo_academico'];
		$desempenio ['evaluacion_id'] = 0;
		$desempenio ['fortalezas'] = $_POST['fortalezas'];
		
		$desempenio ['debilidades'] =$_POST['debilidades'];
		$desempenio ['observaciones'] = $_POST['observaciones'];
		
		$objeto [0] = $evaluacion;
		$objeto [1] = $desempenio;
		$objeto [2] = $respuesta;
		
		$model = new EvaluacionModel ();
		try {
			$datos = $model->saveEvaluacion ( $objeto );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
}