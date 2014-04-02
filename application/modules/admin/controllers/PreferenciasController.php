<?php

class Admin_PreferenciasController extends Zend_Controller_Action
{

    private $_usuario ;
    
    public function init()
    {
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
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
    
    public function cadastrarAction(){
        $idUsuario = $this->_usuario->id;
        $tipo = $this->_getParam('tipo');
        $categoria = $this->_getParam('cat');
        if($tipo == ''){
            $dadosTipos = Admin_Model_Tipo::listaTipo();
        }
        if($tipo>0){
            $dadosCategorias = Admin_Model_Categoria::pesquisaCategoria(null,$this->_getParam('tipo'));
        }
        if($categoria>0){
            $formSubCategoria = new Admin_Form_Preferencias('new', $this->_usuario->id, $categoria);
            $dados = array('tipo'=>$tipo,'categoria'=>$categoria);
            $formSubCategoria->populate($dados);
            $this->view->form = $formSubCategoria;
        }
        
        $dadosSubcategorias = Admin_Model_Subcategoria::pesquisaSubCategoria($idSubCategoria, $categoria);
        
        $this->view->tipo = $tipo;
        $this->view->categoria = $categoria;
        $this->view->dadosCategorias = $dadosCategorias;
        $this->view->dadosTipos = $dadosTipos;        
        $this->view->dadosSubcategorias = $dadosSubcategorias;
    }
    
    public function inserirAction(){
        $this->_helper->viewRenderer->setNoRender(TRUE);
        Admin_Model_Preferencias::salvarPreferencias('compra',$this->getAllParams(),$this->_usuario->id);
        $this->redirect("/admin/preferencias");
    }
}