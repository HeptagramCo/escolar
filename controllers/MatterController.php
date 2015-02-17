<?php  

class MatterController{

    public function indexAction()
    {
    	if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
    		$user = $_SESSION['user'];
    		$consulta = new MatterModel();
    		$values = $consulta->getAll();
        	return new View("matters", ["title" => "Materias | Escuela Nelli Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values]);
        }else{
			header('Location:'.Rutas::getDireccion('login'));
		}
    }

    public function addAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $user = $_SESSION['user'];
            return new View("addMatter", ["title" => "Materias | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin"]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function editAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $user = $_SESSION['user'];
            $matter = $_GET['id'];
            $conmatter = new MatterModel();
            $datamatter = $conmatter->get("id_subject_matter", $matter);
            return new View("editMatter", ["title" => "Materias | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", 'datamatter' => $datamatter]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function addRelationAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $user = $_SESSION['user'];
            $materias = new MatterModel();
            $valuesmaterias = $materias->getAll();
            $grupos = new GroupsModel();
            $valuesgrupos = $grupos->getAll();
            $getnames = new GroupMatterModel();
            $valuesgetnames = $getnames->getNames();
            return new View("addRelation", ["title" => "Materias | Escuela Nelli Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "valuesmaterias" => $valuesmaterias, "valuesgrupos" => $valuesgrupos, "valuesgetnames" => $valuesgetnames]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function editRelationAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $user = $_SESSION['user'];
            $materias = new MatterModel();
            $valuesmaterias = $materias->getAll();
            $grupos = new GroupsModel();
            $valuesgrupos = $grupos->getAll();
            return new View("editRelation", ["title" => "Materias | Escuela Nelli Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "valuesmaterias" => $valuesmaterias, "valuesgrupos" => $valuesgrupos]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function deleteRelationAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $group = $_GET['id'];
            $consulta = new GroupsModel();
            $consulta->delete($group); 
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function meAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 2){
            $user = $_SESSION['user'];
            $group = $_SESSION['group'];
            $consulta = new GroupMatterModel();
            $values = $consulta->getMattersTeacher($group);
            return new View("megroups", ["title" => "Grupos | Escuela Nelli Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }
}