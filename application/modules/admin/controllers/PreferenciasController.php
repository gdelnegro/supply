<?php

class Admin_PreferenciasController extends Zend_Controller_Action
{

    private $_usuario ;
    
    public function init()
    {
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }

    public function indexAction()
    {
        
    }
    
    public function vendaAction(){
        $preferencia = new Admin_Model_Preferencias();
        $dadosVenda = $preferencia->venda();
        
        $this->view->dadosVenda = $dadosVenda;
    }
    
    public function compraAction(){
        $preferencia = new Admin_Model_Preferencias();
        $dadosCompra = $preferencia->compra();
        
        $this->view->dadosCompra = $dadosCompra;
    }


}