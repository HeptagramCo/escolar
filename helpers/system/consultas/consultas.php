<?php  

if (defined('start') || isset($start)) {
	class Consultas extends Conexion
	{

		private $mysqli;

		public function __construct()
		{	
			parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$this->mysqli = parent::setConectar();
		}
		
		public function getConsultar($sql)
		{
			$query = $this->mysqli->query($sql);
			
			if(!isset($query)){
				echo "Problema en la conexion con la base de datos";
			}
			return $query;
		}

	}
}

?>