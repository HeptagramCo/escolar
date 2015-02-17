<?php
class AdminController{

    public function indexAction()
    {
    	if(isset($_SESSION['user']) && $_SESSION['id'] == 1){
    		$user = $_SESSION['user'];
        	return new View("admin", ["title"=>"Bienvenido al Administrador","user" => $user, "layout" => "on", "nameLayout" => "layout.admin"]);
        }else{
			header('Location:'.Rutas::getDireccion('login'));
		}
    }
	
}