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
        $itens = new Admin_Model_Produto();
        #$categorias = new admin_model_categorias();
        #$subCategorias = new Admin_Model_Subcategorias();
        
        $dadosUsuario = $usuario->pesquisaUsuarioPendente();
        $dadosItens = $itens->pesquisaProdutoPendente();
        
        $this->view->dadosUsuario = $dadosUsuario;
        $this->view->dadosItens = $dadosItens;
        
    }
    
    public function showAction(){
        $tipo = $this->_getParam('tipo');//tipo de cadastro que será pesquisado
        $dados = array();
        switch (strtoupper($tipo)) {
            case 'USR':
                $model = new Admin_Model_Usuario();
                $dados = $model->pesquisaUsuarioPendente();
                $titulo = 'Usuários';
                break;
            case 'CAT':
                #$model = new Admin_Model_Categoria();
                #$dados = $model->pesquisarCategoriaPendente();
                $titulo = 'Categorias';
                break;
            case 'SUBCAT':
                #$model = new Admin_Model_Subcategoria();
                #$dados = $model->pesquisarSubcategoriaPendente();
                $titulo = 'Sub-Categorias';
                break;
            case 'ITEM':
                $model = new Admin_Model_Produto();
                $dados = $model->pesquisaProdutoPendente();
                $titulo = 'Itens';
                break;
            default:
                break;
        }

        $paginator = Zend_Paginator::factory($dados);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
        $this->view->titulo = $titulo;
        $this->view->tipo = $tipo;
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

    public function aprovarAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        $tipo = $this->_getParam('tipo');//tipo de cadastro que será removido
        switch (strtoupper($tipo)) {
            case 'USR':
                Admin_Model_Usuario::aprovarUsuario($this->_getParam('id'));
                $this->_redirect('admin/revisao');
                break;
            case 'CAT':
                $modelo = new Admin_Model_Categoria();
                $modelo->removerCadastro($this->_getParam('id'));
                $this->_redirect('admin/revisao');
                break;
            case 'SUBCAT':
                $this->_redirect('admin/revisao');
                break;
            case 'ITEM':
                $this->_redirect('admin/revisao');
                break;
            default:
                break;
        }
    }
}