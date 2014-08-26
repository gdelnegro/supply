<?php

class Admin_CatalogoController extends Zend_Controller_Action
{

    private $_usuario ;
    private $_orcamento;
    private $_produtos;
    
    public function init()
    {        
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        $modelo = new Admin_Model_Notificacoes();        
        $contagem = $modelo->count($this->_usuario->id);
        Zend_Layout::getMvcInstance()->assign('contagem', $contagem[0]['total']);
        $this->_orcamento = new Admin_Model_Orcamento();
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }

    public function indexAction()
    {
        
        $produto = new Admin_Model_Produto();
        $dadosProduto = $produto->pesquisaProdutoFornece($this->_usuario->id);
        $paginator = Zend_Paginator::factory($dadosProduto);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
        $this->view->grupoUsuario = $this->_usuario->grupo;
        $this->view->dados = $dadosProduto;
        
        //DADOS ANUNCIOS
        $anuncios = new Admin_Model_Anuncio();

        $tipos = Admin_Model_Preferencias::getTipoCompra($this->_usuario->id);
        foreach($tipos as $key => $value){            
            $tiposPreferencia[] = intval($value['idTipo']);
        }        
        
        $categorias = Admin_Model_Preferencias::getCategoriaCompra($this->_usuario->id);
        foreach($categorias as $key => $value){            
            $categoriasPreferencia[] = intval($value['idCategoria']);
        }
        
        $modeloSegmento = new Admin_Model_Preferencias();
        $segmentos = $modeloSegmento->getSegmentoCompra($this->_usuario->id);
        foreach($segmentos as $key => $value){            
            $segmentosPreferencia[] = intval($value['idTipo']);
        }
        
        $dadosAnuncios = $anuncios->getAnuncio($tiposPreferencia, $categoriasPreferencia, $segmentosPreferencia,6);
        if(count($dadosAnuncios)<2){
            $dadosAnuncios = $anuncios->getAnuncio(null, null, null,6);
        }
        $this->view->dadosAnuncios = $dadosAnuncios;
        //DADOS ANUNCIOS
        $catalogos = new Admin_Model_DbTable_Catalogos();
        $this->view->dadosCatalogos = $catalogos->fetchAll(array('pessoa'=>$this->_usuario->id));
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
        $this->view->idOrcamento = $idOrcamento;
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
        $this->view->idOrcamento = $idOrcamento;
        
        $dadosProdutos = $orcamento->pesquisaProdutos($idOrcamento);
        $paginator = Zend_Paginator::factory($dadosProdutos);
        $paginator->setItemCountPerPage(20);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
                
    }
    
    public function uploadAction(){
        $form = new Admin_Form_Upload('new', $this->_usuario->id);
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            //die(var_dump($data));
            //if ( $form->isValid($data) ){
                $titulo = $data['nome'];
                $descricao = $data['descricao'];
                $segmento = $data['segmento'];
                $tipo = $data['tipo'];
                $categoria = $data['categoria'];
                /*Faz upload do arquivo*/
                $upload = new Zend_File_Transfer_Adapter_Http();
                foreach ($upload->getFileInfo() as $file => $info) {                                     
                    $extension = pathinfo($info['name'], PATHINFO_EXTENSION); 
                    $upload->addFilter('Rename', array( 'target' => APPLICATION_PATH.'/../public/catalogos/'.$this->_usuario->id.'_'.$titulo.'.'.$extension,'overwrite' => true,));
                    //$caminho = APPLICATION_PATH.'/../public/catalogos/'.$this->_usuario->id.'_'.$titulo.'.'.$extension;
                }
                try {
                    $upload->receive();
                    $banco_catalogos = new Admin_Model_DbTable_Catalogos();
                    $caminho = '/catalogos/'.$this->_usuario->id.'_'.$titulo.'.'.$extension;
                    $dados = array(
                        'titulo'        =>  $titulo,
                        'pessoa'        =>  $this->_usuario->id,
                        'data_upload'   =>  date('Y-m-d'),
                        'local'         =>  $caminho,
                        'tipo'          =>  $tipo,
                        'segmento'      =>  $segmento,
                        'categoria'     =>  $categoria
                    );
                    try {
                        $banco_catalogos->insert($dados);
                        $this->redirect("/admin/catalogo/");
                    } catch (Exception $ex) {
                        die($ex->getMessage());
                    }
                    
                } catch (Zend_File_Transfer_Exception $e) {
                    die($e->getMessage());
                }
            /*}else{
                $this->view->erro='Dados Invalidos';
                $this->view->formMateria = $form->populate($data);
            }*/
        }
        $this->view->form = $form;
    }
    
    public function delarquivoAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        
        $modelo = new Admin_Model_DbTable_Catalogos();
        if($modelo->delete(array('id_catalogo' => $this->_getParam('id')))){
            $this->redirect("/admin/catalogo/");
        }else{
            return false;
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
           $this->redirect("/admin/catalogo/");
        }else{                
            $this->view->erro='Dados Invalidos';
            $this->view->$form = $form->populate(Admin_Model_Produto::pesquisaProdutoFornece( $this->_usuario->id, $this->_getParam('id') ));
        }
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
                $this->_redirect('admin/orcamento');
            }else{
                $nome_produto = $this->_getParam('nome_produto');
                $idTipo = $this->_getParam('produto_tipo');
                $idcategoria = $this->_getParam('produto_categoria');
                $idSegmento = $this->_getParam('produto_segmento');
                try{
                    $idProduto = Admin_Model_Produto::addProduto($idUsuario,$idSegmento,$nome_produto);
                    try{
                        Admin_Model_Produto::addProdutoFornece($this->_usuario->id, $idProduto, $this->_getParam('preco_produto'), $this->_getParam('quantidade_produto'), $this->_getParam('codigo_produto'));
                        $this->_redirect('admin/orcamento');
                    } catch (Exception $ex) {
                        Admin_Model_Produto::removerProduto($idProduto);
                    }
                } catch (Exception $ex) {
                    #die($ex->getMessage());
                }
            }
            
        }
    }


}

