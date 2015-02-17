<?php

class HomeController{

    public function indexAction()
    {
        return new View("home", ["title" => "Escuela Nelly Campobello", "layout" => "off"]);
    }
}