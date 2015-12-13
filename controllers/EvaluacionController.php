<?php
require_once (PATH_MODELS . "/EvaluacionModel.php");
/**
 * Controlador de Usuarios
 */
class EvaluacionController {
	public function display() {
		$model = new EvaluacionModel();
		$postulacion_id = $_POST["id"];
		$postulante = $model->getUsuario($model->getPostulante($postulacion_id));
		$usuario = $model->getUsuario($_SESSION['SESSION_USER']['id']);
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
		$respuestas = array();
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
				$total= $total+$porcentaje;
				$respuesta['valor'] = $porcentaje;
			}
			$respuesta['pregunta_id'] =  $_POST['pregunta'.$value];		
			$respuestas[] = $respuesta;	
		}
		
		$evaluacion['valor'] = $total;
		$evaluacion['observacion'] = $_POST['observaciones'];
		$evaluacion['fecha'] = $_POST['fecha_evaluacion'];
		$evaluacion['etapa_id'] = 3;
		$evaluacion['postulacion_id'] = $_POST['postulacion_id'];
		$evaluacion['id_usuario'] = $_SESSION['SESSION_USER']['id']; 
		$evaluacion['activo'] = 1;
		$evaluacion["id"] = 0;
		if ($total >=9)
		{
			$evaluacion['aprobado'] = 1;
		}
		else
		{
			$evaluacion['aprobado'] = 0;
		}
		
		$desempenio["id"] = 0;
		$desempenio['nivel'] = $_POST['curso'];
		$desempenio['fecha'] = $_POST['fecha_evaluacion'];
		$desempenio ['asignatura'] = $_POST['asignatura'];
		$desempenio ['tema'] = $_POST['tema'];
		$desempenio ['periodo'] = $_POST['periodo_academico'];
		$desempenio ['fortalezas'] = $_POST['fortalezas'];		
		$desempenio ['debilidades'] =$_POST['debilidades'];
		$desempenio ['observaciones'] = $_POST['observaciones'];
		
		$objeto [0] = $evaluacion;
		$objeto [1] = $desempenio;
		$objeto [2] = $respuestas;
		
		$model = new EvaluacionModel ();
		try {
			$datos = $model->saveEvaluacion ( $objeto );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../Postulacion/index.php?action=loadPostulante" );
	}
}