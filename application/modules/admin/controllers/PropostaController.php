<?php

class Admin_PropostaController extends Zend_Controller_Action
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
        $modelo = new Admin_Model_Notificacoes();        
        $contagem = $modelo->count($this->_usuario->id);
        Zend_Layout::getMvcInstance()->assign('contagem', $contagem[0]['total']);
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }
    
//    public function newAction(){            
//        $this->_produtos = $_SESSION['produtos'];
//        $proposta = new Admin_Model_Proposta();
//        $formProposta = new Admin_Form_Proposta('new', $this->_usuario->grupo);        
//        $produto = $this->_getParam('produtos');
//        $quantidades = $this->_getParam('quantidade');
//        if($produto != null AND $quantidades != null){
//            foreach($produto as $key => $value){
//                if(isset($quantidades[$key])){
//                    $produtos[$key]['id'] = $value;
//                    $produtos[$key]['qtde'] = $quantidades[$key];
//                }
//            }
//            $_SESSION['produtos'] =$produtos;
//        }
//        
//        if( $this->_getParam('descricao')!= NULL ) {
//            $data = $this->getRequest()->getPost();   
//            if ( $formProposta->isValid($data) ){
//                    $idOrcamento = $orcamento->insereOrcamento($data,$this->_usuario->id);
//                    $idOrcamento = $idOrcamento['id'];
//                    if($this->_produtos != null){
//                        foreach($this->_produtos as $chave => $produto){                            
//                            $orcamento->insereProdutos($idOrcamento, $produto['id'], $produto['qtde']);
//                        }
//                    }
//                    unset($_SESSION['produtos']);
//                    $this->redirect("/admin/orcamento/edit/id/{$idOrcamento}");
//                }else{                
//                    $this->view->erro='Dados Invalidos';
//                    $this->view->formOrcamento = $formProposta->populate($data);
//                }
//        }
//        $this->view->formOrcamento = $formProposta;
//    }
    
    public function newAction(){
        $idOrcamento = $this->_getParam('orcamento');
        $formProposta = new Admin_Form_Proposta('new', $this->_usuario->id, $idOrcamento);
        $formProposta->populate(array('orcamento'=>$idOrcamento));
        
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            if($data != null){
                if ($formProposta->isValid($data) ){
                    Admin_Model_Proposta::insereProposta($data, $this->_usuario->id);
                }else{                
                    $this->view->erro='Dados Invalidos';
                    $this->view->formProposta = $formProposta->populate($data);
                }
            }
        }
            
        $this->view->formProposta = $formProposta;
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