<?php
class AdminstudentsController{

    public function indexAction()
    {
    	if(isset($_SESSION['user']) && $_SESSION['id'] == 3){
    		$user = $_SESSION['user'];
            $maestro = strtoupper($user);
        	return new View("adminstudents", ["title"=>"Bienvenido(a) Alumno","user" => $user, "layout" => "on", "nameLayout" => "layout.admin"]);
        }else{
			header('Location:'.Rutas::getDireccion('accessstudents'));
		}
    }
	
}