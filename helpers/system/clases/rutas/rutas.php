<?php  
	
if (defined('start') || isset($start)) {
	class Rutas
	{
		private static $_app_path;

		public static function getDireccion($direccion)
		{
			self::$_app_path = ROOT_RUTA;
			return self::$_app_path.$direccion;
		}

		public static function getInclude($direccion)
		{
			$direccion = ereg_replace ("/", SLASH, $direccion);
			self::$_app_path = $_SERVER['DOCUMENT_ROOT'];;
			return self::$_app_path.$direccion;
		}
	}
}

?>