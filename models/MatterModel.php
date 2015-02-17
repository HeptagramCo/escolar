<?php

    class MatterModel{

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
                FROM subject_matter
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
                FROM subject_matter
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rowsAll[] = $row;
            }

            return $this->rowsAll;
        
        }

        public function mattersStudents($id = null)
        {
            $query = $this->conn->getConsultar("
                SELECT students.*, subject_matter.*
                FROM students
                INNER JOIN subject_matter
                ON students.id_groups = subject_matter.id_groups
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

        public function set($modify = array())
        {
            extract($modify);
            if($this->conn->getConsultar("
                INSERT INTO subject_matter
                (name_subject_matter)
                VALUES
                ('$nombre')
                "))
            {
                header('Location:'.Rutas::getDireccion('matter'));
            }else{
                 exit("El registro no se ha completado por algun motivo");
            }
        }

        public function edit($id, $values = array())
        {
            extract($values);
            if($this->conn->getConsultar("
                UPDATE subject_matter
                SET name_subject_matter = '$nombre'
                WHERE id_subject_matter = '$id'
            "))
            {
                header('Location:'.Rutas::getDireccion('matter'));
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