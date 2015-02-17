<?php  

class TutorController{

    public function indexAction()
    {
    	if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
    		$user = $_SESSION['user'];
    		$consulta = new TutorModel();
    		$values = $consulta->getAll();
        	return new View("tutor", ["title" => "Tutor | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values]);
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
            return new View("addTutor", ["title" => "Tutor | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values, "idS" => $idS]);
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
            $tutor = $_GET['id'];
            $conTutor = new TutorModel();
            $dataTutor = $conTutor->get("id_tutor", $tutor);
            return new View("editTutor", ["title" => "Tutor | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values, "idS" => $idS, 'dataTutor' => $dataTutor]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function deleteAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $tutor = $_GET['id'];
            $consulta = new TutorModel();
            $consulta->delete($tutor); 
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }
}