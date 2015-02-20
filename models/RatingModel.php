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

        public function getEsp($comparate = null, $value = null,$comparate_two = null, $value_two = null)
        {
            $query = $this->conn->getConsultar("
                SELECT *
                FROM rating
                WHERE $comparate = '$value' AND $comparate_two = '$value_two'
            ");

            while($row = $query->fetch_array(MYSQLI_ASSOC)){
                $this->rows[] = $row;
            }

            return $this->rows;

        }

        public function getC($comparate = null, $value = null,$comparate_two = null, $value_two = null, $comparate_three = null, $value_three = null)
        {
            $query = $this->conn->getConsultar("
                SELECT *
                FROM rating
                WHERE $comparate = '$value' AND $comparate_two = '$value_two' AND $comparate_three = '$value_three'
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
               (number_rating, id_students, id_subject_matter, id_cycle, id_groups)
               VALUES
               ('$rating', '$student', '$matter', '$cycle', '$group')
            "))
            {
                Cookies::set("complete","Se ha agregado calificacion a estudiante","20-s");
               header('Location:'.Rutas::getDireccion('students'));
            }else{
                Cookies::set("complete","El registro no se ha completado por algun motivo","20-s");
            }
        }

        public function edit($id, $set = array())
        {
            extract($set);
            if($this->conn->getConsultar("
               UPDATE rating
               SET number_rating = '$rating', id_students = '$student', id_subject_matter = '$matter', id_cycle = '$cycle', id_groups = '$group'
               WHERE id_rating = '$id'
            "))
            {
               header('Location:'.Rutas::getDireccion('students'));
            }else{
               exit("El registro no se ha completado por algun motivo");
            }
        }


        public function delete($id)
        {
            if($this->conn->getConsultar("
                DELETE FROM students
                WHERE id_students = '$id'
            ")){
                Cookies::set("delete","Se ha eliminado estudiante","20-s");
                header('Location:'.Rutas::getDireccion('students'));
            }else
            {
                Cookies::set("alert","Ocurrio algun error o el archivo ya no existe","20-s");
            }
        }
    }

?>
