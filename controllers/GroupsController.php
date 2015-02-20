<?php  

class GroupsController{

    public function indexAction()
    {
    	if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
    		$user = $_SESSION['user'];
    		$consulta = new GroupsModel();
    		$values = $consulta->getAll();
        	return new View("groups", ["title" => "Grupos | Escuela Nelli Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values]);
        }else{
			header('Location:'.Rutas::getDireccion('login'));
		}
    }

    public function addAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $user = $_SESSION['user'];
            return new View("addGroups", ["title" => "Groups | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin"]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function editAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $user = $_SESSION['user'];
            $group = $_GET['id'];
            $congroup = new GroupsModel();
            $datagroup = $congroup->get("id_groups", $group);
            return new View("editGroup", ["title" => "Grupos | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", 'datagroup' => $datagroup]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function deleteAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $group = $_GET['id'];
            $consulta = new GroupsModel();
            $consulta->delete($group); 
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function searchAction(){
        $valor = $_POST['consulta'];
        $by = $_POST['by'];
        $consulta = new GroupsModel();
        $values = $consulta -> search($valor,$by);
        return $values;
    }
    
}