<?php
	class Cookies{

		public static function set($name,$value,$time, $path = "/", $domain = Null, $secure = False, $httponly = False)
		{

			$time2 = Cookies::getTime($time);
			if ($domain == Null){
				setcookie($name, $value, $time2, $path);
			}else{
				setcookie($name, $value, $time2, $path, $domain, $secure, $httponly);
			}
		}

		public static function getTime($time)
		{
			$value = explode("-",$time);
			$num = intval($value[0]);
			$unidad = strtoupper($value[1]);
			if($unidad == "M"){
				$timeSeconds = $num * 60;
			}
			else if($unidad == "H"){
				$timeSeconds = $num * 3600;
			}
			else if($unidad == "D"){
				$timeSeconds = $num * (3600*12);
			}
			else{
				$timeSeconds = $num;
			}
			$durationTime=time()+$timeSeconds;
			return $durationTime;
		}

		public static function get($name = Null)
		{
			return $_COOKIE[$name];
		}

		public static function delete($name)
		{
			setcookie($name, "", 1);
		}

		public static function getAll()
		{
			return array_keys($_COOKIE);
		}

	}
?>
