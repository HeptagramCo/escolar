<?php

    class GroupsModel{

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
                FROM groups
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
                FROM groups ORDER BY year_section_groups
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rowsAll[] = $row;
            }

            return $this->rowsAll;
        
        }

        public function set($modify = array())
        {
            extract($modify);
            if($this->conn->getConsultar("
                INSERT INTO groups
                (year_section_groups)
                VALUES
                ('$nombre')
                "))
            {
                header('Location:'.Rutas::getDireccion('groups'));
            }else{
                 exit("El registro no se ha completado por algun motivo");
            }
        }

        public function edit($id, $values = array())
        {
            extract($values);
            if($this->conn->getConsultar("
                UPDATE groups
                SET year_section_groups = '$nombre'
                WHERE id_groups = '$id'
            "))
            {
                header('Location:'.Rutas::getDireccion('groups'));
            }else
            {
                exit("Ocurrio un error en la modificacion");
            }
        }

        public function delete($id)
        {
            if($this->conn->getConsultar("
                DELETE FROM groups
                WHERE id_groups = '$id'
            ")){
                header('Location:'.Rutas::getDireccion('groups'));
            }else
            {
                exit("Ocurrio algun error o el archivo ya no existe");
            }
        }
    }


?>