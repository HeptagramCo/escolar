<?php  

if (defined('start') || isset($start)) {
	class Token
	{
		public static function getToken($_value)
		{
			$private_clave = md5("@aplication_wcode(encrypt)@");
			$join = md5($private_clave);
			$code = md5($_value);
			$token = md5($join.$code);

			return $token;
		}
	}
}

?>