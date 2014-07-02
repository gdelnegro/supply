<?php

class Admin_ProdutosController extends Zend_Controller_Action
{

    private $_usuario ;
    
    public function init()
    {
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        $modelo = new Admin_Model_Notificacoes();        
        $contagem = $modelo->count($this->_usuario->id);
        Zend_Layout::getMvcInstance()->assign('contagem', $contagem[0]['total']);
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
        $this->view->dados = $dadosProduto;
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
            if( is_array($this->_getParam('produtos')) && count( $this->_getParam('produtos') )>0){
                foreach($this->_getParam('produtos') as $indice => $produto){
                    Admin_Model_Produto::addProdutoFornece($this->_usuario->id, $produto, '0', '0', '0');
                }
                $this->_redirect('admin/produtos/venda');
            }else{
                $nome_produto = $this->_getParam('nome_produto');
                $idTipo = $this->_getParam('produto_tipo');
                $idcategoria = $this->_getParam('produto_categoria');
                $idSegmento = $this->_getParam('produto_segmento');
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
            if( is_array($this->_getParam('produtos')) && count( $this->_getParam('produtos') )>0){
                foreach($this->_getParam('produtos') as $indice => $produto){
                    Admin_Model_Produto::addProdutoCompra($this->_usuario->id, $produto, '0');
                }
                $this->_redirect('admin/produtos/compra');
            }else{
                $nome_produto = $this->_getParam('nome_produto');
                $idTipo = $this->_getParam('produto_tipo');
                $idcategoria = $this->_getParam('produto_categoria');
                $idSegmento = $this->_getParam('produto_segmento');
                try{
                    $idProduto = Admin_Model_Produto::addProduto($idUsuario,$idSegmento,$nome_produto);
                    try{
                        Admin_Model_Produto::addProdutoCompra($this->_usuario->id, $idProduto, $this->_getParam('quantidade_produto'));
                        $this->_redirect('admin/produtos/compra');
                    } catch (Exception $ex) {
                        Admin_Model_Produto::removerProduto($idProduto);
                    }
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
            }
        }
    }
    
    
//    public function addprodutocompraAction(){
//        $this->_helper->layout()->disableLayout();
//    	$this->_helper->viewRenderer->setNoRender(true);
//        if($this->_usuario->grupo != 1){
//            $idUsuario = $this->_usuario->id;
//        }else{
//            $idUsuario = null;
//        }
//        if($this->getRequest()){
//            $nome_produto = $this->_getParam('nome_produto');
//            $idTipo = Admin_Model_Tipo::getId($this->_getParam('produto_tipo'));
//            $idcategoria = Admin_Model_Categoria::getId($idTipo,$this->_getParam('produto_categoria'));
//            $idSegmento = Admin_Model_Segmento::getId($idcategoria,$this->_getParam('produto_segmento'));
//            try{
//                $idProduto = Admin_Model_Produto::addProduto($idUsuario,$idSegmento,$nome_produto);
//                try{
//                    Admin_Model_Produto::addProdutoCompra($this->_usuario->id, $idProduto, $this->_getParam('quantidade_produto'));
//                    $this->_redirect('admin/produtos/compra');
//                } catch (Exception $ex) {
//                    Admin_Model_Produto::removerProduto($idProduto);
//                }
//            } catch (Exception $ex) {
//                #die($ex->getMessage());
//            }
//        }
//    }

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
    
    public function deleteprefAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        Admin_Model_Produto::deleteProd($this->_getParam('pref'), $this->_getParam('id'));
        if(strtoupper($this->_getParam('pref')) == 'VENDA'){
            $this->_redirect('admin/produtos/venda');
        }else{
            $this->_redirect('admin/produtos/compra');
        }
    }
    
    public function editvendaAction(){
        $form = new Admin_Form_Produtovenda('edit',$this->_usuario->grupo);
        $form->populate( Admin_Model_Produto::pesquisaProdutoFornece( $this->_usuario->id, $this->_getParam('id') ) );
        $this->view->form = $form;
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            if ( $form->isValid($data) ){
                try {
                    $dados['quantidade'] = $data['quantidade'];
                    $dados['precoItem'] = $data['precoItem'];
                    $dados['codigo'] = $data['codigo'];
                    
                    Admin_Model_Produto::editProd($this->_usuario->id, $this->_getParam('id'), 'VENDA', $dados);
                } catch (Exception $exc) {
                    die($exc->getTraceAsString());
                }
           }    
           $this->redirect("/admin/produtos/venda/");
        }else{                
            $this->view->erro='Dados Invalidos';
            $this->view->$form = $form->populate($data);
        }
    }
    
    public function editcompraAction(){
        
    }

}

