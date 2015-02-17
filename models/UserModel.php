<?php

    class UserModel{

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
                FROM users
                WHERE $comparate = '$value'
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rows[] = $row;
            }

            return $this->rows;
            

           /* while($row = $query->fetch_all())
            {
               return [
                    "nombre" => $row["name_user"],
                    "nick" => $row["nick_user"],
                    "email" => $row["email_user"],
                    "type" => $row["type_user"],
                    "direccion" => $row["direccion_user"],
                    "ciudad" => $row["ciudad_user"],
                    "postal" => $row["postal_user"],
                    "web" => $row["web_user"]
                ];

            }*/

        }

        public function getAll()
        {
            $query = $this->conn->getConsultar("
                SELECT *
                FROM users
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rowsAll[] = $row;
            }

            return $this->rowsAll;
        
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
                            (enrollment_teachers, name_teachers, user_teachers, curp_teachers, sex_teachers, birth_teachers, address_teachers, postal_code_teachers, phone_teachers, password_teachers, id_schools)
                            VALUES
                            ('$name', '$nick_name', '$avatar', '$email', '$type', '$direccion', '$ciudad', '$postal', '$web')
                        "))
                    {
                        exit("Registro Completo");
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