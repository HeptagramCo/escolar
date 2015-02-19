<?php  

class TeachersController{

    public function indexAction()
    {
    	if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
    		$user = $_SESSION['user'];
    		$consulta = new TeachersModel();
    		$values = $consulta->getAll();
        	return new View("teachers", ["title" => "Teachers | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values]);
        }else{
			header('Location:'.Rutas::getDireccion('login'));
		}
    }

    public function addAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $user = $_SESSION['user'];
            $consulta = new UserModel();
            $values = $consulta->get("name_user", $user);
                foreach ($values as $row) {
                    $idS = $row['id_schools'];
                }
            $grupos = new GroupsModel();
            $data = $grupos->getAll();
            return new View("addTeachers", ["title" => "Teachers | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values, "idS" => $idS, 'data' => $data]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function editAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $user = $_SESSION['user'];
            $consulta = new UserModel();
            $values = $consulta->get("name_user", $user);
                foreach ($values as $row) {
                    $idS = $row['id_schools'];
                }
            $teacher = $_GET['id'];
            $conTeacher = new TeachersModel();
            $dataTeacher = $conTeacher->get("id_teachers", $teacher);
            $grupos = new GroupsModel();
            $data = $grupos->getAll();
            return new View("editTeachers", ["title" => "Teachers | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values, "idS" => $idS, 'data' => $data, 'dataTeacher' => $dataTeacher]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function deleteAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $teacher = $_GET['id'];
            $consulta = new TeachersModel();
            $consulta->delete($teacher);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function searchAction(){
        $valor = $_POST['consulta'];
        $by = $_POST['by'];
        $consulta = new TeachersModel();
        $values = $consulta -> search($valor,$by);
        return $values;
    }
}