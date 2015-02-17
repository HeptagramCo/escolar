<?php
class AdminteacherController{

    public function indexAction()
    {
    	if(isset($_SESSION['user']) && $_SESSION['id'] == 2){
    		$user = $_SESSION['user'];
            $maestro = strtoupper($user);
        	return new View("adminteacher", ["title"=>"Bienvenido (a) ".$maestro,"user" => $user, "layout" => "on", "nameLayout" => "layout.admin"]);
        }else{
			header('Location:'.Rutas::getDireccion('accessteacher'));
		}
    }
	
}