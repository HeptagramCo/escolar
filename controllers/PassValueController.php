<?php

class PassValueController{

    public function indexAction()
    {
    	$passValue = Security::getEncrypt($_POST['password']);
        return new View("passValue", ["passValue" => $passValue, "layout" => "off"]);
    }
}