<?php

if (defined('start') || isset($start)) {
	$puerto = ":8888";
	define("ROOT_RUTA", "http://".$_SERVER['SERVER_NAME'].$puerto."/");
	define('SLASH', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . SLASH);
	define('APP_PATH', ROOT . 'system' . SLASH);

	require_once APP_PATH . 'config'. SLASH . 'Config.php';
	require_once APP_PATH . 'conexion' . SLASH . 'conexion.php';
	require_once APP_PATH . 'consultas' . SLASH .'consultas.php';
	require_once APP_PATH . 'clases'. SLASH . "rutas" . SLASH . "rutas.php";
	require_once APP_PATH . 'clases'. SLASH . "security" . SLASH . "encrypt.php";
	require_once APP_PATH . 'clases'. SLASH . "security" . SLASH . "getToken.php";
	require_once APP_PATH . 'clases'. SLASH . "paginacion" . SLASH . "paginacion.php";
	require_once APP_PATH . 'clases'. SLASH . "date" . SLASH . "date.php";
	require_once APP_PATH . 'clases'. SLASH . "cookies" . SLASH . "Cookies.php";
	require_once APP_PATH . 'clases'. SLASH . "session" . SLASH . "SessionGenerate.php";
	
}
/*$prueba = new Consultas();

$prueba->hola();*/

/*echo Rutas::getInclude("system/clases/rutas/rutas.php");
echo Rutas::getDireccion("system/clases/rutas/rutas.php");*/

/*$consultar = new Consultas();

$sql = "INSERT INTO clases (cursos_id, clases_nombre, clases_descripcion) VALUES (1, 'hola', 'hola')";

if($consultar->getConsultar($sql))
{
	echo "Registro completo";
}*/

/*while($crow = $query->fetch_array()){

	$id = $crow['clases_id'];
	$nombre = $crow["clases_nombre"];
	$descripcion = $crow["clases_descripcion"];

	echo "<br>";

	echo $id;
	echo "<br>";
	echo $nombre;
	echo "<br>";
	echo $descripcion;
}*/

/*echo "<br>";

if("28121eee6334151bc877f55d395abd1b3b06371d0cc7c8f3fa85b73f542a7489" == Security::getEncrypt("hola")){
	echo "Las claves son las mismas mi chingon";
}

echo Security::getEncrypt("hola");*/

/*echo Date::getTiempo("2013-02-04");

echo "<br>";

echo Token::getToken("hola");

echo "<br>";

echo Token::getToken("hola");

echo "<br>";
echo "<br>";
echo "<br>";

$limit = 2;
$page  = $_GET['page'];
$url   = "/?";
$from  = "select * from clases ";
$where = "where cursos_id = 2";

$paginacion = new Paginacion($limit, $page, $url, $from);

$query = $paginacion->getConsultar();


while($crow = $query->fetch_array()){

	$id = $crow['clases_id'];
	$nombre = $crow["clases_nombre"];
	$descripcion = $crow["clases_descripcion"];

	echo "<br>";
	echo "* "." ".$id." ".$nombre." ".$descripcion;
}*/

?>
