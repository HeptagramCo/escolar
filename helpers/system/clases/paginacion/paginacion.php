<?php 
	
if (defined('start') || isset($start)) {
	class Paginacion extends Conexion
	{

		private $_limit;
		private $_page;
		private $_offset;
		private $_url;
		private $_from;
		private $_where;
		private $mysqli;
		private $_nrows;

		public function __construct($limit, $page, $url, $from, $where = null)
		{
			parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			$this->mysqli = parent::setConectar();

			$this->_limit = $limit;
			$this->_page  = $page;
				if ($page < 1) 
				{
					$page = 1;
				}

			$this->_offset  = ($page - 1) * $limit;
			$this->_url   = $url;
			$this->_from  = $from;
			$this->_where = $where;
			$this->getNrows();
		}


		public function getConsultar()
		{
			$query = $this->mysqli->query($this->_from. " ". $this->_where." limit ".$this->_offset.", ".$this->_limit);
			
			if(!isset($query)){
				echo "Problema en la conexion con la base de datos";
			}
			return $query;
		}

		public function getNrows()
		{
			$query1 = $this->mysqli->query($this->_from."  ".$this->_where);
			$row = $query1->num_rows;
			$this->_nrows = $row;
		}


		public function getPaginar($activado, $desabilitado){

			//La variable ini solamente indica cual es la pagina principal
			$ini=1;

			//Obtenemos el total de paginas           
			$totalPag = ceil($this->_nrows/$this->_limit);
			//Creamos el array que en este caso lo llamamos $link
			$links = array();

			//Declaracion de variables
			$anterior = $this->_page - 1;
			// Declaramos la variable limita la cual almacena el valor obtenido por medio del metodo get
			$limita=$_GET['page']+5;

			//Los if´s que uso a continuacion son para detectar si se esta en la pagina actual si la respuesta es TRUE entonses se imprime el valor en un spam si la respuesta es FALSE entonses se crea una etiqueta a que direccionara hacia la pagina deseada
			echo "<div class='content-pagination-default'>";
			//Boton nos dirige al principio
			if($this->_page > 1){

				echo "<a class='".$activado."' href=".$this->_url."page=$ini> Inicio </a>";
				     	
			}else{

				echo "<span class='".$desabilitado."'>Inicio</span>";
				     	
			}

			//Boton Anterior

			if($anterior >= $ini){

			    echo "<a class='".$activado."' href=".$this->_url."page=$anterior> Anterior </a>";
			
			}else{

			    echo "<span class='".$desabilitado."'>Anterior</span>";
			}


			// Este es un algoritmo muy sencillo el cual detecta el numero de pageinas
			// si el numero de pageinas es mayor a 4 la variable valori tomara el valor de la variable page
			// si no es mayor toma el valor de cero

			if ($totalPag > 4) {
			     		# code...
			    $valordei = $_GET['page'];
			
			}else{

			    $valordei = 0;
			}

			// Con este for intriduciremos valores a nuestro array creado anteriormente empieza con un valor inicial de 
			// $valordei esto se hace para que solo tome el variable creada con una condicion
			// Nuestro For se compara con la variable limita creada anterirmente          
			for( $i = $valordei; $i<= $limita; $i++)
			{	
				// Si limita es menor o igual a total de pageinas entonces crear los links
			    if($limita<=$totalPag){

				    if($i == $_GET['page']){

				     	$links[] = "<span class='".$desabilitado."'>$i</span>";

				    }else{
				    	$links[] = "<a class='".$activado."' href=".$this->_url."page=$i>$i</a>";
				    }

			    }else{
		
			      	$limita = $totalPag;

			        if($limita > 4){

			        	$i = $totalPag - 5;

			    	}

			    }

			}

			//imprimir los valores creados en nuestro array
			echo implode(" ", $links);

			// Boton siguiente
			$sig = $this->_page + 1;

			if($sig <= $totalPag){

			    echo "<a class='".$activado."' href=".$this->_url."page=$sig> Siguiente </a>";

			}else{

			    echo "<span class='".$desabilitado."'>Siguiente</span>";
			}

			    
			// Boton Final
			if($this->_page == $totalPag){

			    echo "<span class='".$desabilitado."'>Final</span>";

			}else{

			    echo "<a class='".$activado."' href=".$this->_url."page=$totalPag> Finales </a>";
			     		
			}


		echo "</div>";

	}

	}

}

?>