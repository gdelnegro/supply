<?php

class Admin_PerfilController extends Zend_Controller_Action
{

    public function init()
    {        
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        $this->_orcamento = new Admin_Model_Orcamento();
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }

    public function indexAction()
    {
        // action body
    }


}

