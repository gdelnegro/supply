<?php

class Admin_PreferenciasController extends Zend_Controller_Action
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
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }

    public function indexAction()
    {
        $this->view->dadosCompras = Admin_Model_Preferencias::compra($this->_usuario->id);
        $this->view->dadosVendas = Admin_Model_Preferencias::venda($this->_usuario->id);
    }
    
    public function vendaAction(){
        $preferencia = new Admin_Model_Preferencias();
        $dadosVenda = $preferencia->venda();
        $this->view->dadosVenda = $dadosVenda;
    }
    
    public function compraAction(){
        $preferencia = new Admin_Model_Preferencias();
        $dadosCompra = $preferencia->compra();
        
        $this->view->dadosCompra = $dadosCompra;
    }
    
//    public function cadastrarAction(){
//        $idUsuario = $this->_usuario->id;
//        $tipo = $this->_getParam('tipo');
//        $categoria = $this->_getParam('cat');
//        if($tipo == ''){
//            $dadosTipos = Admin_Model_Tipo::listaTipo();
//        }
//        if($tipo>0){
//            $dadosCategorias = Admin_Model_Categoria::pesquisaCategoria(null,$this->_getParam('tipo'));
//        }
//        if($categoria>0){
//            $formSubCategoria = new Admin_Form_Preferencias('new', $this->_usuario->id, $categoria);
//            $dados = array('tipo'=>$tipo,'categoria'=>$categoria);
//            $formSubCategoria->populate($dados);
//            $this->view->form = $formSubCategoria;
//        }
//        
//        $dadosSubcategorias = Admin_Model_Subcategoria::pesquisaSubCategoria($idSubCategoria, $categoria);
//        
//        $this->view->tipo = $tipo;
//        $this->view->categoria = $categoria;
//        $this->view->dadosCategorias = $dadosCategorias;
//        $this->view->dadosTipos = $dadosTipos;        
//        $this->view->dadosSubcategorias = $dadosSubcategorias;
//    }
    
//    public function inserirAction(){
//        #$this->_helper->viewRenderer->setNoRender(TRUE);
//        $this->_helper->layout()->disableLayout();
//        
//        if($this->_getParam('tipoPref') == 'compra' || $this->_getParam('tipoPref') == 'venda'){
//            Admin_Model_Preferencias::salvarPreferencias($this->_getParam('tipoPref'),$this->getAllParams(),$this->_usuario->id);
//        }
//        
//        #$this->redirect("/admin/preferencias");
//    }
    
    public function inserirAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        $idUsuario = $this->_usuario->id;
        $preferencia = $this->_getParam('pref');
        
        $tipo = $this->_getParam('tipo');
        $categoria = $this->_getParam('categoria');
        $segmento = $this->_getParam('segmento');
        $dados = array(
            "pessoa"    => $idUsuario,
            "tipo"      =>  $tipo,
            "categoria" =>  $categoria,
            "subcategoria"  =>  $segmento
        );
        try{
            Admin_Model_Preferencias::insertPref($preferencia, $dados);
        } catch (Exception $ex) {
            die(var_dump($ex->getMessage()));
        }
    }
    
//    public function cadastrarvendaAction(){
//        $this->_helper->layout()->disableLayout();
//        $idUsuario = $this->_usuario->id;
//        $tipo = $this->_getParam('tipo');
//        $categoria = $this->_getParam('cat');
//        if($tipo == ''){
//            $dadosTipos = Admin_Model_Tipo::listaTipo();
//        }
//        if($tipo>0){
//            $dadosCategorias = Admin_Model_Categoria::pesquisaCategoria(null,$this->_getParam('tipo'));
//        }
//        if($categoria>0){
//            $formSubCategoria = new Admin_Form_Preferencias('new', $this->_usuario->id, $categoria);
//            $dados = array('tipo'=>$tipo,'categoria'=>$categoria);
//            $formSubCategoria->populate($dados);
//            $this->view->form = $formSubCategoria;
//        }
//        
//        $dadosSubcategorias = Admin_Model_Subcategoria::pesquisaSubCategoria($idSubCategoria, $categoria);
//        
//        $this->view->tipo = $tipo;
//        $this->view->categoria = $categoria;
//        $this->view->dadosCategorias = $dadosCategorias;
//        $this->view->dadosTipos = $dadosTipos;        
//        $this->view->dadosSubcategorias = $dadosSubcategorias;
//    }
    
    public function listatiposAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        if(strtoupper($this->_getParam('filtro'))== 'VENDA'){
            echo json_encode(Admin_Model_Preferencias::getTipoVenda($this->_usuario->id));
        }elseif(strtoupper($this->_getParam('filtro'))== 'COMPRA'){
            echo json_encode(Admin_Model_Preferencias::getTipoCompra($this->_usuario->id));
        }
    }
    
    public function listacategoriasAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        if(strtoupper($this->_getParam('filtro'))== 'VENDA'){
            echo json_encode(Admin_Model_Preferencias::getCategoriaVenda($this->_usuario->id, $this->_getParam('tipo'), $this->_getParam('categoria')));
        }elseif(strtoupper($this->_getParam('filtro'))== 'COMPRA'){
            echo json_encode(Admin_Model_Preferencias::getCategoriaCompra($this->_usuario->id, $this->_getParam('tipo'), $this->_getParam('categoria')));
        }
    }
    
    public function listasegmentosAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        if(strtoupper($this->_getParam('filtro'))== 'VENDA'){
            echo json_encode(Admin_Model_Preferencias::getSegmentoVenda($this->_usuario->id, $this->_getParam('tipo'), $this->_getParam('categoria'), $this->_getParam('segmento')));
        }elseif(strtoupper($this->_getParam('filtro'))== 'COMPRA'){
            echo json_encode(Admin_Model_Preferencias::getSegmentoCompra($this->_usuario->id, $this->_getParam('tipo'), $this->_getParam('categoria'), $this->_getParam('segmento')));
        }
    }
    
//    public function testeAction(){
//    }
    
    public function cadastrarpreferenciaAction(){
        //$this->_helper->layout()->disableLayout();
        $preferencia = $this->_getParam('pref');
        $this->view->preferencia = $preferencia;
    }
}