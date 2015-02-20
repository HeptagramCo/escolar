<?php

    class GroupMatterModel{

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
                FROM group_matter
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
                FROM group_matter
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rowsAll[] = $row;
            }

            return $this->rowsAll;

        }

        public function getNames()
        {
            $query = $this->conn->getConsultar("
                SELECT group_matter.*, groups.*, subject_matter.*
                FROM group_matter
                INNER JOIN groups
                ON groups.id_groups = group_matter.id_groups
                INNER JOIN subject_matter
                ON subject_matter.id_subject_matter = group_matter.id_subject_matter
            ");
            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rows[] = $row;
            }

            return $this->rows;
        }

        public function getMattersGroup($group)
        {
            $query = $this->conn->getConsultar("
               SELECT group_matter.*, subject_matter.*
               FROM group_matter
               INNER JOIN subject_matter
               ON subject_matter.id_subject_matter = group_matter.id_subject_matter
               WHERE id_groups = '$group'
            ");
            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rows[] = $row;
            }

            return $this->rows;
        }

        public function getMattersTeacher($group)
        {
            $query = $this->conn->getConsultar("
                SELECT group_matter.*, subject_matter.*
                FROM group_matter
                INNER JOIN subject_matter
                ON subject_matter.id_subject_matter = group_matter.id_subject_matter
                WHERE id_groups = '$group'
            ");
            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rows[] = $row;
            }

            return $this->rows;
        }

        public function set($modify = array())
        {
            extract($modify);
            if($this->conn->getConsultar("
                INSERT INTO group_matter
                (id_groups, id_subject_matter)
                VALUES
                ('$grupos', '$materias')
                "))
            {
                Cookies::set("complete","Se ha registrado materia en grupo","20-s");
                header('Location:'.Rutas::getDireccion('matter/addRelation'));
            }else{
                 
                 Cookies::set("alert","El registro no se ha completado por algun motivo","20-s");
            }
        }

        public function edit($id, $values = array())
        {
            extract($values);
            if($this->conn->getConsultar("
                UPDATE group_matter
                SET id_groups = '$grupos', id_subject_matter = '$materias'
                WHERE id_group_matter = '$id'
            "))
            {
                Cookies::set("complete","Se ha modificado materia en grupo","20-s");   
                header('Location:'.Rutas::getDireccion('matter/addRelation'));
            }else
            {
                Cookies::set("alert","Ocurrio un error en la modificacion","20-s");
            }
        }

        public function delete($id)
        {
            if($this->conn->getConsultar("
                DELETE FROM users
                WHERE id_user = '$id'
            ")){
                
                Cookies::set("delete","Se a eliminado correctamente","20-s");
            }else
            {
                Cookies::set("delete","Ocurrio algun error o el archivo ya no existe","20-s");
            }
        }
    }


?>
