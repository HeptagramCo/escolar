<?php

class RatingController{

   public function indexAction()
   {
     if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
         $user = $_SESSION['user'];
         $consult_one = new GroupsModel();
         $groups = $consult_one->getAll();
         $consult_two = new CyclesModel();
         $cycles = $consult_two->getAll();
          return new View("rating", ["title" => "Calificadiones | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "groups" => $groups, "cycles" => $cycles]);
      }else{
        header('Location:'.Rutas::getDireccion('deletesession'));
     }
   }
   public function registerAction()
   {
     if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
         $user = $_SESSION['user'];
         $cycle = $_POST['cycle'];
         $group = $_POST['group'];
         $consult = new RatingModel();
         $ratings = $consult->getEsp("id_cycle", $cycle, "id_groups", $group);
         $consult_one = new GroupMatterModel();
         $matters = $consult_one->getMattersGroup($_POST["group"]);
         $consult_two = new StudentsModel();
         $students = $consult_two->get("id_groups", $_POST["group"]);
          return new View("register", ["title" => "Calificadiones | Escuela Nelly Campobello", "layout" => "on", "user" => $user ,"nameLayout" => "layout.admin", "matters" => $matters, "students" => $students, "cycle" => $cycle, "group" => $group, "ratings" => $ratings]);
      }else{
        header('Location:'.Rutas::getDireccion('deletesession'));
     }
   }

   public function setAction()
   {
      if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
         $user = $_SESSION['user'];
         if($_POST)
         {
            $register = new RatingModel();
            foreach ($_POST as $key=>$values)
            {
               $segments = explode('-', $key);

               $register->set([
                  "rating" => $values,
                  "matter" => $segments[0],
                  "student" => $segments[1],
                  "cycle" => $segments[2],
                  "group" => $segments[3],
                  ]);
            }
         }
      }else{
        header('Location:'.Rutas::getDireccion('deletesession'));
     }
   }

   public function updateAction()
   {
      if(isset($_SESSION['user']) && $_SESSION["id"] == 1){
         $user = $_SESSION['user'];
         if($_POST)
         {
            $register = new RatingModel();
            foreach ($_POST as $key=>$values)
            {
               $segments = explode('-', $key);

               $register->edit($segments[0],[
                  "rating" => $values,
                  "matter" => $segments[1],
                  "student" => $segments[2],
                  "cycle" => $segments[3],
                  "group" => $segments[4],
                  ]);
            }
         }
      }else{
        header('Location:'.Rutas::getDireccion('deletesession'));
     }
   }

}
