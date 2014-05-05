<?php

class Admin_SegmentoController extends Zend_Controller_Action
{

    private $_usuario;
    public function init()
    {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity()) {
            return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }elseif($this->_usuario->grupo != 1){
            return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'index'), null, true);
        }
    }

    public function indexAction()
    {
        // action body
    }
    
    public function showAction(){
        $dados = Admin_Model_Categoria::pesquisaCategoria($this->_getParam('id'));        
        $dados = Admin_Model_Segmento::pesquisaSegmento($this->_getParam('id'));
        $this->view->dados = $dados;
    }
    
    public function listasegmentosAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        echo json_encode(Admin_Model_Segmento::listaSegmento($this->_getParam('id'),null ));
    }
        


}

