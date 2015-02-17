<?php  
	
if (defined('start') || isset($start)) {
	class Date
		{	
			public static function getDias($fecha_f)
			{
				$fecha_i = date("Y-m-d");
				$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
				$dias 	= abs($dias); $dias = floor($dias);	
				return $dias;
			}

			public static function getTiempo($fecha_f)
			{
				$fecha_i = date("Y-m-d");
				$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
				$dias 	= abs($dias); $dias = floor($dias);	
				
				if($dias == 1){
					$nombre=1;
					return ""." ".$nombre." "."día";
				}
				if($dias > 31 && $dias < 61){
					$nombre=1;
					return ""." ".$nombre." "."mes";
				}elseif ($dias >= 62 && $dias <= 92) {
					# code...
					$nombre=2;
					return ""." ".$nombre." "."meses";
				}elseif ($dias >= 93) {
					# code...
					$nombre=3;
					return "+"." ".$nombre." "."meses";
				}else{
					return ""." ".$dias." "."días";
				}
				
				
			}
		}

	date_default_timezone_set('America/Mexico_City');
}

?>