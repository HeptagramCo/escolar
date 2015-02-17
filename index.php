<?php
session_start();
/*
 * El frontend controller se encarga de
 * configurar nuestra aplicacion
 */
define("start", True);
$start = True;
require __DIR__.("/helpers/index.php");
require 'config.php';
require 'helpers/templates.php';

//Library
require 'library/Request.php';
require 'library/Inflector.php';
require 'library/Response.php';
require 'library/View.php';
require 'models/UserModel.php';
require 'models/StudentsModel.php';
require 'models/TeachersModel.php';
require 'models/TutorModel.php';
require 'models/CyclesModel.php';
require 'models/MatterModel.php';
require 'models/GroupsModel.php';
require 'models/GroupMatterModel.php';
require 'models/RatingModel.php';


//Llamar al controlador indicado

if (empty($_GET['url']))
{
    $url = "";
}
else
{
    $url = $_GET['url'];
}

$request = new Request($url);
$request->execute();
//password para los alumnos es: alumno
