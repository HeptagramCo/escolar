<?php

    class RatingModel{

        protected $conn;
        public $rows;
        public $rows2;
        public $rowsAll;

        public function __construct()
        {
            $this->conn = new Consultas();
        }

        public function get($comparate = null, $value = null)
        {
            $query = $this->conn->getConsultar("
                SELECT *
                FROM rating
                WHERE $comparate = '$value'
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rows[] = $row;
            }

            return $this->rows;

        }

        public function getAll()
        {
            $query = $this->conn->getConsultar("
                SELECT *
                FROM rating
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rowsAll[] = $row;
            }

            return $this->rowsAll;

        }



        public function set($set = array())
        {
            extract($set);
            if($this->conn->getConsultar("
               INSERT INTO rating
               (number_rating, id_students, id_subject_matter, id_cycle)
               VALUES
               ('$rating', '$student', '$matter', '$cycle')
            "))
            {
               header('Location:'.Rutas::getDireccion('students'));
            }else{
               exit("El registro no se ha completado por algun motivo");
            }
        }

        public function edit($id, $repit, $user, $values = array())
        {
            if($repit == "no"){
                $comparateOne = $this->get("user_students",$user);
                if(empty($comparateOne)){
                    extract($values);
                    if($this->conn->getConsultar("
                        UPDATE students
                        SET enrollment = '$matricula', numberList_students = '$lista', name_students = '$nombre', user_students = '$user', curp_students = '$curp', sex_students = '$sex', birth_students = '$nacimiento', address_students = '$direccion', postal_code_students = '$postal', phone_students = '$telefono', phone_alternative_students = '$telefonoA', disease_students = '$enfermedad', city_students = '$ciudad', town_students = '$municipio', password_students = '$pass', id_tutor = '$tutor', id_schools = '$school', id_groups = '$grupo'
                        WHERE id_students = '$id'
                    "))
                    {
                        header('Location:'.Rutas::getDireccion('students'));
                    }else
                    {
                        exit("Ocurrio un error en la modificacion");
                    }
                }else{
                    exit("El usuario ya existe");
                }
            }else{
                extract($values);
                    if($this->conn->getConsultar("
                        UPDATE students
                        SET enrollment = '$matricula', numberList_students = '$lista', name_students = '$nombre', user_students = '$user', curp_students = '$curp', sex_students = '$sex', birth_students = '$nacimiento', address_students = '$direccion', postal_code_students = '$postal', phone_students = '$telefono', phone_alternative_students = '$telefonoA', disease_students = '$enfermedad', city_students = '$ciudad', town_students = '$municipio', password_students = '$pass', id_tutor = '$tutor', id_schools = '$school', id_groups = '$grupo'
                        WHERE id_students = '$id'
                    "))
                    {
                        exit("Se ha modificado correctamente");
                    }else
                    {
                        exit("Ocurrio un error en la modificacion");
                    }
            }
        }

        public function delete($id)
        {
            if($this->conn->getConsultar("
                DELETE FROM students
                WHERE id_students = '$id'
            ")){
                header('Location:'.Rutas::getDireccion('students'));
            }else
            {
                exit("Ocurrio algun error o el archivo ya no existe");
            }
        }
    }

?>
