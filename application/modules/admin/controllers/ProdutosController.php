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
    
    public function prefvendaAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        $idUsuario = $this->_usuario->id;
        $dadosPreferencias = Admin_Model_Preferencias::venda($idUsuario);
        echo json_encode($dadosPreferencias);
    }
    
    public function addvendaAction(){
        if($this->getRequest()->getMethod == "get"){
            die(var_dump($this->getRequest()));
        }else{
            $idUsuario = $this->_usuario->id;
            $dadosPreferencias = Admin_Model_Preferencias::getTipoVenda($idUsuario);
            $this->view->dadosPreferencias = $dadosPreferencias;
        }
    }
    
    public function addprodutoAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        
        if($this->getRequest()){
            #die(var_dump($this->getAllParams()));
            $nome_produto = $this->_getParam('nome_produto');
            $idTipo = Admin_Model_Tipo::getId($this->_getParam('produto_tipo'));
            $idcategoria = Admin_Model_Categoria::getId($idTipo,$this->_getParam('produto_categoria'));
            $idSegmento = Admin_Model_Segmento::getId($idcategoria,$this->_getParam('produto_segmento'));
            die(var_dump($idSegmento));
        }
    }

    public function showAction(){
        $dados  = Admin_Model_Produto::pesquisaProduto($this->_getParam('id'),null);
        $this->view->dados = $dados;
    }

}

