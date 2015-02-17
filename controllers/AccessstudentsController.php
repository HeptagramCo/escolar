<?php

	class AccessstudentsController
	{

		public function indexAction()
		{
			if(isset($_SESSION['user'])){
	    		header('Location:'.Rutas::getDireccion('adminstudents'));
	        }else{
				return new View("accessstudents", ["title" => "Iniciar Sesion", "layout" => "off"]);
			}
			
		}

		public function userAction()
		{
			$consulta = new StudentsModel();
			$values = $consulta->get("user_students",$_POST['name']);
			return new View("userConsultas", ["values" => $values, "layout" => "off"]);
		}

	}