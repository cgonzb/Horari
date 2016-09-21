<?php
class center_resource {
	/**
	 *
	 * @var string nombre de la tabla
	 */
	public $tableName = 'center_resource';
	public $headers = ["center_id", "resource_id", "lastmodified"];
	
	public function __construct($centerid = 'null', $resourceid = 'null') {
		$this->centerid = $centerid;
		$this->resourceid = $resourceid;
	}
	public function update() {
		/**
		 * @return boolean updates center_resource
		 */
		//incluye la conexion a la base de datos
		require_once dirname(__FILE__) . '/../config/config.php';
		/**
		 * @var string query de ejecución
		 */
		$query = "UPDATE  $this->tableName  SET center_id = ' $this->centerid ', resource_id = ' $this->resourceid ', lastmodified = NOW() WHERE center_id = $this->centerid and resource_id = $this->resourceid";
		/**
		 * @var mysql resultado mysql
		 */

		if ($res = $BD->query($query)) {
			return true;
		} else {
			return false;
		}
		
		$BD->close();
	}
	public function insert() {
		/**
		 * @return boolean Inserta en la base de datos
		 */
		require_once dirname(__FILE__) . '/../config/config.php';
		/**
		 * @var string query de ejecución
		 */
		if ($this->centerid !== null && $this->resourceid !== null) {
			$query = "INSERT INTO  . $this->tableName . VALUES (' . $this->centerid . ', ' . $this->resourceid . ', NOW())";
			

			if ($res = $BD->query($query)) {
				return true;
			} else {
				return false; //la consulta no se ejecuto
			}
		} else {
			return false; //no hay un dato asignado
		}
		
		$BD->close();
	}
	public function delete() {
		/**
		 * @return boolean borra de la base de datos
		 */
		require_once dirname(__FILE__) . '/../config/config.php';
		/**
		 * @var string query de ejecución
		 */
		if ($this->centerid !== null && $this->resourceid !== null) {
			$query = "DELETE FROM  $this->tableName  WHERE  $this->headers[0] = $this->centerid and $this->headers[1] = $this->resourceid";

			if ($res = $BD->query($query)) {
				return true;
			} else {
				return false; //la consulta no se ejecuto
			}
		} else {
			return false; //no hay un dato asignado
		}
		
		$BD->close();
	}
	public function getAll() {
		/**
		 *
		 * @return array|false devuelve todas las center resource o falso si no hay
		 */
		//incluye la conexion a la base de datos
		require_once dirname(__FILE__) . '/../config/config.php';
		/**
		 * @var string query de ejecución
		 */
		$query = "SELECT * FROM  $this->tableName";
		/**
		 * @var mysql resultado mysql
		 */
		$res = $BD->query($query);
		if (mysql_num_rows($res) >= 1) {
			while ($row = mysql_fetch_assoc($res)) {
				$result [] = $row;
			}
			return $result;
		} else {
			return false;
		}
	}
}
?>
