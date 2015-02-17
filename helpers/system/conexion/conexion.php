<?php  

if (defined('start') || isset($start)) {
	class Conexion
	{
		protected $_server;
		private $_user;
		private $_pass;
		private $_db;
		private $_conectar;

		public function __construct($server, $user, $pass, $db)
		{
			$this->_server = $server;
			$this->_user = $user;
			$this->_pass = $pass;
			$this->_db = $db;
			$this->setConectar();
			/*$this->setSelectDB();*/
		}

		public function setConectar()
		{
			return $this->_conectar = new mysqli($this->_server,
											 	 $this->_user,
											 	 $this->_pass,
											 	 $this->_db);
		}

		/*public function getConexion()
		{
			return $this->_conectar;
		}
		private function setSelectDB()
		{
			mysqli_select_db(DB_NAME)or die(mysql_error());
		}*/

	}
}

?>