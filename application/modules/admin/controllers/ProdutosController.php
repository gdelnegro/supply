<?php

class Admin_ProdutosController extends Zend_Controller_Action
{

    private $_usuario ;
    
    public function init()
    {
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }

    public function indexAction()
    {
        $this->_helper->viewRenderer->setNoRender(true);
    }
    
    public function vendaAction(){
        $produto = new Admin_Model_Produto();
        $dadosProduto = $produto->pesquisaProdutoFornece($this->_usuario->id);
        $paginator = Zend_Paginator::factory($dadosProduto);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
    }
    
    public function compraAction(){
        $produto = new Admin_Model_Produto();
        $dadosProduto = $produto->pesquisaProdutoCompra($this->_usuario->id);
        $paginator = Zend_Paginator::factory($dadosProduto);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
        
        $this->view->id = $this->_getParam('orcamento');
    }
    
    public function addvendaAction(){
        $idUsuario = $this->_usuario->id;
        $dadosPreferencias = Admin_Model_Preferencias::venda($idUsuario);
        $this->view->dadosPreferencias = $dadosPreferencias;
    }    

    public function showAction(){
        $dados  = Admin_Model_Produto::pesquisaProduto($this->_getParam('id'),null);
        $this->view->dados = $dados;
    }

}

