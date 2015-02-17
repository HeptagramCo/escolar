<?php

class StudentsController{

    public function indexAction()
    {
    	if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
    		$user = $_SESSION['user'];
    		$consulta = new StudentsModel();
    		$values = $consulta->getAll();
        	return new View("students", ["title" => "Alumnos | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values]);
        }else{
			header('Location:'.Rutas::getDireccion('deletesession'));
		}
    }

    public function goAction()
    {
    	if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
    		$user = $_SESSION['user'];
    		$consulta = new StudentsModel();
            $values = $consulta->profileStudents($_GET['id']);
            $consulta2 = new StudentsModel();
            $values2 = $consulta2->ratingStudents($_GET['id']);
            $consulta3 = new CyclesModel();
            $cycles = $consulta3->getall();
            //$consulta4 = new MatterModel();
            //$matters = $consulta4->mattersStudents($_GET['id']);
        	return new View("go", ["title" => "Alumnos | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values, "values2" => $values2, "cycles" => $cycles]);
        }else{
			header('Location:'.Rutas::getDireccion('deletesession'));
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
            $tutor = new TutorModel();
            $dataTutor = $tutor->getAll();  
            $grupos = new GroupsModel();
            $dataGroups = $grupos->getAll();
            return new View("addStudents", ["title" => "Alumnos | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values, "idS" => $idS, 'dataGroups' => $dataGroups, 'dataTutor' => $dataTutor]);
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
            $student = $_GET['id'];
            $conStudent = new StudentsModel();
            $dataStudent = $conStudent->get("id_students", $student);
            $tutor = new TutorModel();
            $dataTutor = $tutor->getAll();
            $grupos = new GroupsModel();
            $dataGroups = $grupos->getAll();
            return new View("editStudents", ["title" => "Alumnos | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values, "idS" => $idS, 'dataStudent' => $dataStudent, 'dataGroups' => $dataGroups, 'dataTutor' => $dataTutor]);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function deleteAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
            $student = $_GET['id'];
            $consulta = new StudentsModel();
            $consulta->delete($student);
        }else{
            header('Location:'.Rutas::getDireccion('login'));
        }
    }

    public function meAction()
    {
        if(isset($_SESSION['user']) && $_SESSION["id"] == 2){
            $user = $_SESSION['user'];
            $group = $_SESSION['group'];
            $consulta = new StudentsModel();
            $values = $consulta->get("id_groups", $group);
            return new View("me", ["title" => "Alumnos | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "values" => $values]);
        }else{
            header('Location:'.Rutas::getDireccion('deletesession'));
        }
    }


}