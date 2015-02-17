<?php

class SessionController{
	private $_session;

    public function indexAction()
    {
    	$this->_session = new SessionGenerate();
    	$this->_session = $this->_session->getSession($_POST['id'], $_POST['user'], $_POST['key'], $_POST['group']);
    }

}