<?php

class Admin_OrcamentoController extends Zend_Controller_Action
{

    private $_usuario ;
    private $_orcamento;
    
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
        $dados = $this->_orcamento->pesquisaOrcamento($this->_usuario->id);
        $paginator = Zend_Paginator::factory($dados);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
    }
    
    public function newAction(){
        $formOrcamento = new Admin_Form_Orcamento('new', $this->_usuario->grupo);
        $this->view->formOrcamento = $formOrcamento;
        $produto = new Admin_Model_Produto();
        $dadosProduto = $produto->pesquisaProduto($idProduto,$subCategoria);
    }
    
    public function propostasAction(){
        $idOrcamento = $this->_getParam('id');
        $dadosOrcamento = $this->_orcamento->pesquisaPropostas($idOrcamento);
        $paginator = Zend_Paginator::factory($dadosOrcamento);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
    }

}