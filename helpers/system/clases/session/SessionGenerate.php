<?php
	class SessionGenerate{
		private $_id;
		private $_user;
		private $_key;
		private $_group;

		public function getSession($id = null, $user = null, $key = null, $group = null)
		{
			$this->_id = $id;
			$this->_user = $user;
			$this->_key = $key;
			$this->_group = $group;
			$_SESSION['group'] = $this->_group;
			$_SESSION['key'] = $this->_key;
			$_SESSION['id'] = $this->_id;
			return $_SESSION['user'] = $this->_user;
		}
	}