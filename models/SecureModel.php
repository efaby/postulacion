<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class SecureModel {

	public function clean($str){
		$str = @trim($str);
		if(get_magic_quotes_gpc())
		{
			$str = stripslashes($str);
		}
		return addslashes($str);
	}
	
	public function validationUser($login, $password){
		$model = new model();
		$sql = "select id, nombres, apellidos, tipo_usuario_id, activo
				from usuario
				where username= '".$login."' and password = '".md5($password)."'";
		
		$result = $model->runSql($sql);
		$result = $model->getRows($result);
		return (count($result)>0)?$result[0]:0;		
	}
	
	public function getUsersList($offset, $limit){
		$model = new model();
		$offset = (($offset - 1) * $limit);
		$sql = $this->getSql(true);
		$sql .= " limit ".$offset.",".$limit;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	public function getUsersListCount(){
		$model =  new model();
		$sql = $this->getSql(false);
		$result = $model->runSql($sql);
		$result = $model->getRows($result);
		return $result[0]["total"];
	}
	private function getSql($type){
		if($type){
			$sql = "select u.id, u.identity_card, u.names, u.lastnames, u.is_active, ut.name as type ";
		} else {
			$sql = "select count(u.id) as total ";
		}
		$sql .= " from user as u inner join user_type as ut on ut.id = u.user_type_id where u.user_type_id <> 3 order by u.user_type_id desc";
		return $sql;
	}
	
	public function getUser(){
		$user = $_GET['id'];
		$model =  new model();
		$sql = "select * from user where id = ".$user;
		$result = $model->runSql($sql);
		$resultArray = $model->getRows($result);
		return $resultArray[0];
	}
	
	public function saveUser(){		
		$id = $_POST['id'];
		$identity_card = $_POST['identity_card'];		
		$names = $_POST['names'];
		$lastnames = $_POST['lastnames'];
		$name_user = $_POST['name_user'];
		$type = $_POST['user_type_id'];
		$city = $_POST['city_id'];
		if($id > 0){
			$sql = "update user set identity_card = '$identity_card', names = '$names', lastnames = '$lastnames', name_user = '$name_user', user_type_id = '$type', city_id = '$city' where id = $id";
		} else {
			$sql = "insert into user(identity_card,names, lastnames, name_user, user_type_id, city_id, is_active) values ('$identity_card','$names','$lastnames','$name_user','$type','$city',1)";
		}	
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	public function deleteUser(){
		$user = $_GET['id'];
		$sql = "delete from user where id = ".$user;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	public function getUrlsAccess($type){
		$model =  new model();
		$sql = "select path from access where user_type_id = ".$type;
		$result = $model->runSql($sql);		
		$resultArray = array();
		while ($row = mysql_fetch_assoc($result))
		{
			$resultArray[] = $row['path'];
		}
		return $resultArray;
	}
	
	public function editActive(){
		$user = $_GET['id'];
		$opcion = $_GET["op"];
		$sql = "update user set is_active = ".$opcion." where id = ".$user;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	public function verifyPass($pass, $user){
		$model =  new model();
		$sql = "select id from usuario where id = ".$user." and password = md5('".$pass."')";
		$result = $model->runSql($sql);
		$resultArray = $model->getRows($result);
		return count($resultArray);
	}
	
	public function changePassword($passwd,$user){
		$sql = "update usuario set password = md5('".$passwd."') where id = ".$user;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	public function getEmailByCI($user){
		$model =  new model();
		$sql = "select * from user where identity_card = ".$user;
		$result = $model->runSql($sql);
		$resultArray = $model->getRows($result);
		if(count($resultArray)>0){
			return $resultArray[0];
		}
		return null;
	}
	
	
	
}
