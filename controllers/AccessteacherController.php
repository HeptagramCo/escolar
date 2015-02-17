<?php

	class AccessteacherController
	{

		public function indexAction()
		{
			if(isset($_SESSION['user'])){
	    		header('Location:'.Rutas::getDireccion('adminteacher'));
	        }else{
				return new View("accessteacher", ["title" => "Iniciar Sesion", "layout" => "off"]);
			}
			
		}

		public function userAction()
		{
			$consulta = new TeachersModel();
			$values = $consulta->get("user_teachers",$_POST['name']);
			return new View("userConsultas", ["values" => $values, "layout" => "off"]);
		}

	}