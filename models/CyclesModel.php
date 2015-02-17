<?php

    class CyclesModel{

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
                FROM students
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
                FROM cycle
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rowsAll[] = $row;
            }

            return $this->rowsAll;
        
        }

        public function profileStudents($id = null)
        {
            $query = $this->conn->getConsultar("
                SELECT students.*, tutor.*, groups.*
                FROM students
                INNER JOIN tutor
                ON tutor.id_tutor = students.id_tutor
                INNER JOIN groups
                ON groups.id_groups = students.id_groups
                WHERE id_students = '$id'
            ");
            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rows[] = $row;
            }
            
            return $this->rows;
        }

        public function ratingStudents($id = null)
        {
            $query2 = $this->conn->getConsultar("
                SELECT rating.*, subject_matter.*, cycle.*
                FROM rating
                INNER JOIN subject_matter
                ON rating.id_subject_matter = subject_matter.id_subject_matter
                INNER JOIN cycle
                ON rating.id_cycle = cycle.id_cycle
                WHERE id_students = '$id'
            ");
            while($row = $query2->fetch_array(MYSQLI_ASSOC)){
                $this->rows2[] = $row;
            }
        
             return $this->rows2;
        }

        public function set($nick, $correo, $modify = array())
        {

            $comparateOne = $this->get("nick_user",$nick);
            $comparateTwo = $this->get("email_user",$correo);
            if(empty($comparateOne)){
                if(empty($comparateTwo)){
                    extract($modify);
                    if($this->conn->getConsultar("
                            INSERT INTO   users
                            (name_user, nick_user, avatar_user, email_user, type_user, direccion_user, ciudad_user, postal_user, web_user)
                            VALUES
                            ('$name', '$nick_name', '$avatar', '$email', '$type', '$direccion', '$ciudad', '$postal', '$web')
                        "))
                    {
                        header('Location:'.Rutas::getDireccion('cycles'));
                    }else{
                        exit("El registro no se ha completado por algun motivo");
                    }
                }else{
                    exit("El correo ya esta registrado");
                }
            }else{
                exit("El usuario ya existe");
            }
        }

        public function edit($id, $values = array())
        {
            extract($values);
            if($this->conn->getConsultar("
                UPDATE user
                SET name_user = '$name', nick_user = 'nick_neme', avatar_user = '$avatar', email_user = '$email', type_user = '$type', direccion_user = '$direccion', ciudad_user = '$ciudad', postal_user = '$postal', web_user = '$web'
                WHERE id_user = '$id'
            "))
            {
                exit("Se ha modificado correctamente");
            }else
            {
                exit("Ocurrio un error en la modificacion");
            }
        }

        public function delete($id)
        {
            if($this->conn->getConsultar("
                DELETE FROM users
                WHERE id_user = '$id'
            ")){
                exit("Se a eliminado correctamente");
            }else
            {
                exit("Ocurrio algun error o el archivo ya no existe");
            }
        }
    }
?>