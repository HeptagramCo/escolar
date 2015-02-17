<?php  
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
$passReturn = array("password"=>$passValue);
echo json_encode($passReturn);
?>