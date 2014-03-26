<?php

class Admin_RevisaoController extends Zend_Controller_Action
{

    private $_usuario;
    public function init()
    {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity()) {
            return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }elseif($this->_usuario->grupo != 1){
            return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'index'), null, true);
        }
    }

    public function indexAction()
    {
        $usuario = new Admin_Model_Usuario();
        #$itens = new admin_model_Itens();
        #$categorias = new admin_model_categorias();
        #$subCategorias = new Admin_Model_Subcategorias();
        
        $dadosUsuario = $usuario->pesquisaUsuarioPendente();
        
        $this->view->dadosUsuario = $dadosUsuario;
        
    }
    
    public function deletarAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        $tipo = $this->_getParam('tipo');//tipo de cadastro que será removido
        switch (strtoupper($tipo)) {
            case 'USR':
                Admin_Model_Usuario::removerUsuario($this->_getParam('id'));
                $this->_redirect('admin/revisao');
                break;
            case 'CAT':
                $modelo = new Admin_Model_Categoria();
                $modelo->removerCadastro($this->_getParam('id'));
                break;
            case 'SUBCAT':
                break;
            case 'ITEM':
                break;
            default:
                break;
        }
    }


}

