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

        $produtos = $this->_getParam('produtos');
        $quantidade = $this->_getParam('quantidade');
        
        if($produtos != null AND $quantidade != null){
            foreach($produtos as $indice => $idProduto){
                $dadosProdutos[$indice]['idProduto'] = $idProduto;
                $dadosProdutos[$indice]['quantidade'] = $quantidade[$indice];
            }
            $_SESSION['produtos'] = $dadosProdutos;
        }
        
        if( $this->_getParam('descricao')!= NULL ) {
            $data = $this->getRequest()->getPost();   
            if ( $formOrcamento->isValid($data) ){
                    $idOrcamento = $orcamento->insereOrcamento($data,$this->_usuario->id);
                    $idOrcamento = $idOrcamento['id'];
                    if($this->_produtos != null){
                        foreach($this->_produtos as $chave => $produto){
                            $orcamento->insereProdutos($idOrcamento, $produto['idProduto'], $produto['quantidade']);
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