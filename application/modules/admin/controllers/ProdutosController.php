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
        $this->view->grupoUsuario = $this->_usuario->grupo;
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
        $this->view->grupoUsuario = $this->_usuario->grupo;
    }
    
    public function prefvendaAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        $idUsuario = $this->_usuario->id;
        $dadosPreferencias = Admin_Model_Preferencias::venda($idUsuario);
        echo json_encode($dadosPreferencias);
    }
    
    public function addvendaAction(){        
        $idUsuario = $this->_usuario->id;
        $dadosPreferencias = Admin_Model_Preferencias::getTipoVenda($idUsuario);
        $this->view->dadosPreferencias = $dadosPreferencias;
    }
    
    public function addprodutovendaAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        if($this->_usuario->grupo != 1){
            $idUsuario = $this->_usuario->id;
        }else{
            $idUsuario = null;
        }
        if($this->getRequest()){
            $nome_produto = $this->_getParam('nome_produto');
            $idTipo = Admin_Model_Tipo::getId($this->_getParam('produto_tipo'));
            $idcategoria = Admin_Model_Categoria::getId($idTipo,$this->_getParam('produto_categoria'));
            $idSegmento = Admin_Model_Segmento::getId($idcategoria,$this->_getParam('produto_segmento'));
            try{
                $idProduto = Admin_Model_Produto::addProduto($idUsuario,$idSegmento,$nome_produto);
                try{
                    Admin_Model_Produto::addProdutoFornece($this->_usuario->id, $idProduto, $this->_getParam('preco_produto'), $this->_getParam('quantidade_produto'), $this->_getParam('codigo_produto'));
                    $this->_redirect('admin/produtos/venda');
                } catch (Exception $ex) {
                    Admin_Model_Produto::removerProduto($idProduto);
                }
            } catch (Exception $ex) {
                #die($ex->getMessage());
            }
        }
    }
    
    public function addcompraAction(){
        $idUsuario = $this->_usuario->id;
        $dadosPreferencias = Admin_Model_Preferencias::getTipoCompra($idUsuario);
        $this->view->dadosPreferencias = $dadosPreferencias;
    }
    
    public function addprodutocompraAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        if($this->_usuario->grupo != 1){
            $idUsuario = $this->_usuario->id;
        }else{
            $idUsuario = null;
        }
        if($this->getRequest()){
            $nome_produto = $this->_getParam('nome_produto');
            $idTipo = Admin_Model_Tipo::getId($this->_getParam('produto_tipo'));
            $idcategoria = Admin_Model_Categoria::getId($idTipo,$this->_getParam('produto_categoria'));
            $idSegmento = Admin_Model_Segmento::getId($idcategoria,$this->_getParam('produto_segmento'));
            try{
                $idProduto = Admin_Model_Produto::addProduto($idUsuario,$idSegmento,$nome_produto);
                try{
                    Admin_Model_Produto::addProdutoCompra($this->_usuario->id, $idProduto, $this->_getParam('quantidade_produto'));
                    $this->_redirect('admin/produtos/compra');
                } catch (Exception $ex) {
                    Admin_Model_Produto::removerProduto($idProduto);
                }
            } catch (Exception $ex) {
                #die($ex->getMessage());
            }
        }
    }

    public function showAction(){
        $dados  = Admin_Model_Produto::pesquisaProduto($this->_getParam('id'),null);
        $this->view->dados = $dados;
    }
    
    public function deleteAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        if($this->_usuario->grupo == 1){
            Admin_Model_Produto::removerProduto($this->_getParam('id'),'venda', $this->_usuario->id);
        }
    }
    
    public function listaprodutosAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        echo json_encode(Admin_Model_Produto::pesquisaProduto($this->_getParam('produto'), $this->_getParam('categoria')));
    }

}

