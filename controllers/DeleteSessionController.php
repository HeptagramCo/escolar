<?php

class DeleteSessionController{

    public function indexAction()
    {
    	$redireccion = header('Location:'.Rutas::getDireccion(''));
        return new View("deletesession", ["redireccion" => $redireccion, "layout" => "off"]);
    }
}