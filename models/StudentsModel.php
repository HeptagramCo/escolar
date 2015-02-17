<?php  

    class StudentsModel{

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
                FROM students
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

        public function set($user, $modify = array())
        {

            $comparateOne = $this->get("user_students",$user);
            if(empty($comparateOne)){
                    extract($modify);
                    if($this->conn->getConsultar("
                            INSERT INTO students
                            (enrollment, numberList_students ,name_students, user_students, curp_students, sex_students, birth_students, address_students, postal_code_students, phone_students, phone_alternative_students, disease_students, city_students, town_students, password_students, id_tutor, id_schools, id_groups)
                            VALUES
                            ('$matricula', '$lista', '$nombre', '$user', '$curp', '$sex', '$nacimiento', '$direccion', '$postal', '$telefono', '$telefonoA', '$enfermedad', '$ciudad', '$municipio',  '$pass', '$tutor', '$school', '$grupo')
                        "))
                    {
                        header('Location:'.Rutas::getDireccion('students'));
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