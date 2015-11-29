<?php
/**
 * Clase que se usa para la conexion ala base de datos
 */
class model
{
	private $username = USERNAME;
	private $password = PASSWORD;	
	private $database = DATABASE;
	private $host = HOSTNAME_DATABASE;
	private $conexion;	

	/**
	 * Función privada que abre la conexión con la base de datos
	 */
	private function open()
	{
		$this->conexion=mysql_connect($this->host,$this->username,$this->password);
		mysql_set_charset('utf8', $this->conexion);
		mysql_select_db($this->database,$this->conexion);
	}
	
	/**
	 * Función privada que cierra la conexión con la base de datos
	 */
	private function close()
	{
		mysql_close();
	}
	
	/**
	 * Función privada que ejecuta un script de base de datos
	 * @param string $sql script a ejecutar
	 */
	public function runSql($sql,$insertID = false)
	{
		$this->open();
		$result=mysql_query($sql,$this->conexion);
		$this->close();
		if($insertID){
			return mysql_insert_id($this->conexion);
		}
		return $result;
	}
	
	public function getRows($result){
		$resultArray = array();
		while ($row = mysql_fetch_assoc($result))
		{
			$resultArray[] = $row;
		}
		return $resultArray;
	}
	
	public function getCatalog($table){
		$sql = "Select * from ".$table;
		$result = $this->runSql($sql);
		return $this->getRows($result);
	}
	
	public function getAreasActives(){
		$model =  new model();
		$sql = "select * from area where is_active = 1 ";
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
}
