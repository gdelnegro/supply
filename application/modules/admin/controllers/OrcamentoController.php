<?php

class Admin_OrcamentoController extends Zend_Controller_Action
{

    private $_usuario ;
    private $_orcamento;
    private $_produtos;
    
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
        $this->_produtos = $_SESSION['produtos'];
        $orcamento = new Admin_Model_Orcamento();
        $formOrcamento = new Admin_Form_Orcamento('new', $this->_usuario->grupo);        
        $produto = $this->_getParam('produtos');
        $quantidades = $this->_getParam('quantidade');
        if($produto != null AND $quantidades != null){
            foreach($produto as $key => $value){
                if(isset($quantidades[$key])){
                    $produtos[$key]['id'] = $value;
                    $produtos[$key]['qtde'] = $quantidades[$key];
                }
            }
            $_SESSION['produtos'] =$produtos;
        }
        
        if( $this->_getParam('descricao')!= NULL ) {
            $data = $this->getRequest()->getPost();   
            if ( $formOrcamento->isValid($data) ){
                    $idOrcamento = $orcamento->insereOrcamento($data,$this->_usuario->id);
                    $idOrcamento = $idOrcamento['id'];
                    if($this->_produtos != null){
                        foreach($this->_produtos as $chave => $produto){                            
                            $orcamento->insereProdutos($idOrcamento, $produto['id'], $produto['qtde']);
                        }
                    }
                    unset($_SESSION['produtos']);
                    $this->redirect("/admin/orcamento/edit/id/{$idOrcamento}");
                }else{                
                    $this->view->erro='Dados Invalidos';
                    $this->view->formOrcamento = $formOrcamento->populate($data);
                }
        }
        $this->view->formOrcamento = $formOrcamento;
    }
    
    public function editAction(){
        unset($_SESSION['produtos']);
        $idOrcamento = $this->_getParam('id');
        $formOrcamento = new Admin_Form_Orcamento('show', $this->_usuario->grupo);
        $orcamento = new Admin_Model_Orcamento();
        $dadosOrcamento = $orcamento->pesquisaOrcamento($this->_usuario->id, $idOrcamento);
        $formOrcamento->populate($dadosOrcamento);
        $dadosProdutos = $orcamento->pesquisaProdutos($idOrcamento);
        $paginator = Zend_Paginator::factory($dadosProdutos);
        $paginator->setItemCountPerPage(20);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
        $this->view->formOrcamento = $formOrcamento;
        $this->view->id = $idOrcamento;
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
    
    public function additemAction(){
        unset($_SESSION['produtos']);
        $orcamento = new Admin_Model_Orcamento();
        $idOrcamento=$this->_getParam('orcamento');
        $produto = $this->_getParam('produtos');
        $quantidades = $this->_getParam('quantidade');
        if($produto != null AND $quantidades != null){
            foreach($produto as $key => $value){
                if(isset($quantidades[$key])){
                    $produtos[$key]['id'] = $value;
                    $produtos[$key]['qtde'] = $quantidades[$key];
                }
            }
            foreach($produtos as $chave => $produto){                            
                $orcamento->insereProdutos($idOrcamento, $produto['id'], $produto['qtde']);
            }
        }
        $this->redirect("/admin/orcamento/edit/id/{$idOrcamento}");
    }
    
    public function delitemAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        $idProduto = $this->_getParam('id');
        $idOrcamento = $this->_getParam('orcamento');
        $orcamento = new Admin_Model_Orcamento();
        $orcamento->removeProdutos($idOrcamento, $idProduto);
        $this->redirect("/admin/orcamento/edit/id/{$idOrcamento}");
    }
    
    public function showAction(){
        $idOrcamento = $this->_getParam('id');
        $orcamento = new Admin_Model_Orcamento();
        $dadosOrcamento = $orcamento->pesquisaOrcamento($this->_usuario->id, $idOrcamento);
        $this->view->dadosOrcamento = $dadosOrcamento;
        
        $dadosProdutos = $orcamento->pesquisaProdutos($idOrcamento);
        $paginator = Zend_Paginator::factory($dadosProdutos);
        $paginator->setItemCountPerPage(20);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
                
    }
    

}