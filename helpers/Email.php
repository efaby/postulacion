<?php

class Email{
	
	public function sendMail($email_to,$email_subject, $message){
		$email_from = EMAIL;		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
		$headers .= 'From: SISTEMA DE POSTULACIÓN DOCENTE <'.$email_from.">\r\n".
				'Reply-To: '.$email_from."\r\n" .
				'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $message, $headers);
	}
	
	public function sendNotificacionRegistro($name,$email, $token){
		$message = '<table>
					    <tr>
					      <td>Estimado '.$name.',</td>
					    </tr>
					    <tr>
					      <td> Para poder activar su cuenta ingrese al siguiente <a target="_blank" href="http://www.merito.online/web/views/Registro/index.php?action=activarCuenta&tc='.$token.'">link</a>
					      	<br><br>
					      	La Administraci&oacute;n.
					      </td>
					    </tr>
					  </table>';
		$this->sendMail($email, "Registro en Sistema de Postulación Docente", $message);
	}
	
	public function sendNotificacionPostulacion($name,$postulacion,$email, $token){
		$message = '<table>
					    <tr>
					      <td>Estimado '.$name.',</td>
					    </tr>
					    <tr>
					      <td> Le informámos que sú postulacion a '.$postulacion.' ha pasado a una siguiente etapa, por favor ingrese al sistema
					      		con sus credenciales para que pueda verificar el estado de la misma. Para ingresar al sistema de click <a target="_blank" href="http://www.merito.online">aquí</a>.
					      		
					      	<br><br>
					      	La Administraci&oacute;n.
					      </td>
					    </tr>
					  </table>';
		$this->sendMail($email, "Cambio de Etapa en Postulación", $message);
	}
}
