<?php  

if (defined('start') || isset($start)) {
	class Security
	{
		public static function getEncrypt($_value)
		{
			$private_clave = md5("@aplication_wcode(encrypt)@");
			$join = $private_clave.$_value;
			$code = md5($join);
			$key  = hash('sha256', $code);
			
			return $key;

		}
	}
}

?>