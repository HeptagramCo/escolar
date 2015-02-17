<?php

	class LoginController{

		public function indexAction()
		{
			if(isset($_SESSION['user'])){
	    		header('Location:'.Rutas::getDireccion('admin'));
	        }else{
				return new View("login", ["title" => "Iniciar Sesion", "layout" => "off"]);
			}
			
		}

		public function userAction()
		{
			$consulta = new UserModel();
			$values = $consulta->get("name_user",$_POST['name']);
			return new View("userConsultas", ["values" => $values, "layout" => "off"]);
		}

	}