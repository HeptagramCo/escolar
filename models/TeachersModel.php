<?php

    class TeachersModel{

        protected $conn;
        public $rows;
        public $rowsAll;

        public function __construct()
        {
            $this->conn = new Consultas();
        }

        public function get($comparate = null, $value = null)
        {
            $query = $this->conn->getConsultar("
                SELECT *
                FROM teachers
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
                FROM teachers
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rowsAll[] = $row;
            }

            return $this->rowsAll;
        
        }

        public function set($user, $modify = array())
        {

            $comparateOne = $this->get("user_teachers",$user);
            if(empty($comparateOne)){
                    extract($modify);
                    if($this->conn->getConsultar("
                            INSERT INTO teachers
                            (enrollment_teachers, name_teachers, user_teachers, curp_teachers, sex_teachers, birth_teachers, address_teachers, postal_code_teachers, phone_teachers, password_teachers, id_schools, id_groups)
                            VALUES
                            ('$matricula', '$nombre', '$user', '$curp', '$sex', '$nacimiento', '$direccion', '$postal', '$telefono', '$pass', '$school', '$grupo')
                        "))
                    {
                        header('Location:'.Rutas::getDireccion('teachers'));
                    }else{
                        exit("El registro no se ha completado por algun motivo");
                    }
            }else{
                exit("El usuario ya existe");
            }
        }

        public function edit($id, $repit, $user, $values = array())
        {
             if($repit == "no"){
                $comparateOne = $this->get("user_teachers",$user);
                if(empty($comparateOne)){
                    extract($values);
                    if($this->conn->getConsultar("
                        UPDATE teachers
                        SET enrollment_teachers = '$matricula', name_teachers = '$nombre', user_teachers = '$user', curp_teachers = '$curp', sex_teachers = '$sex', birth_teachers = '$nacimiento', address_teachers = '$direccion', postal_code_teachers = '$postal', phone_teachers = '$telefono', password_teachers = '$pass', id_schools = '$school', id_groups = '$grupo'
                        WHERE id_teachers = '$id'
                    "))
                    {
                       header('Location:'.Rutas::getDireccion('teachers'));
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
                        UPDATE teachers
                        SET enrollment_teachers = '$matricula', name_teachers = '$nombre', user_teachers = '$user', curp_teachers = '$curp', sex_teachers = '$sex', birth_teachers = '$nacimiento', address_teachers = '$direccion', postal_code_teachers = '$postal', phone_teachers = '$telefono', password_teachers = '$pass', id_schools = '$school', id_groups = '$grupo'
                        WHERE id_teachers = '$id'
                    "))
                    {
                        header('Location:'.Rutas::getDireccion('teachers'));
                    }else
                    {
                        exit("Ocurrio un error en la modificacion");
                    }
            }
        }

        public function delete($id)
        {
            if($this->conn->getConsultar("
                DELETE FROM teachers
                WHERE id_teachers = '$id'
            ")){
                header('Location:'.Rutas::getDireccion('teachers'));
            }else
            {
                exit("Ocurrio algun error o el archivo ya no existe");
            }
        }
    }

?>