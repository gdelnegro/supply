<?php

class Default_EventosController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
        
    }
    
    public function showAction(){
        $id = $this->_getParam('id');
        $modelo = new Admin_Model_Eventos();
        $dadosEvento = $modelo->getEventos($id);
        $this->view->dadosEvento = $dadosEvento;
    }


}

