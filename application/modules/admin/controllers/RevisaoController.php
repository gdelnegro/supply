<?php

class Admin_RevisaoController extends Zend_Controller_Action
{

    private $_usuario;
    public function init()
    {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        
        $modelo = new Admin_Model_Notificacoes();        
        $contagem = $modelo->count($this->_usuario->id);
        Zend_Layout::getMvcInstance()->assign('contagem', $contagem[0]['total']);
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
        
        $dadosUsuario = $usuario->pesquisaUsuarioPendente(10);
        $dadosItens = $itens->pesquisaProdutoPendente(10);
        $dadosCategorias = Admin_Model_Categoria::pesquisaCategoriaPendente(10);
        $dadosSubCategorias = Admin_Model_Segmento::pesquisaSegmentoPendente(10);
        
        $this->view->dadosUsuario = $dadosUsuario;
        $this->view->dadosItens = $dadosItens;
        $this->view->dadosCategorias = $dadosCategorias;
        $this->view->dadosSubCategorias = $dadosSubCategorias;
        
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
                $dados = Admin_Model_Categoria::pesquisaCategoriaPendente();
                $titulo = 'Categorias';
                break;
            case 'SUBCAT':
                $dados = Admin_Model_Segmento::pesquisaSegmentoPendente();
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
                Admin_Model_Categoria::removerCategoria($this->_getParam('id'));
                $this->_redirect('admin/revisao');
                break;
            case 'SUBCAT':
                Admin_Model_Subcategoria::removerSegmento($this->_getParam('id'));
                $this->_redirect('admin/revisao');
                break;
            case 'ITEM':
                Admin_Model_Produto::aprovarProduto($this->_getParam('id'));
                $this->_redirect('admin/revisao');
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
                Admin_Model_Categoria::aprovarCategoria($this->_getParam('id'));
                $this->_redirect('admin/revisao');
                break;
            case 'SUBCAT':
                Admin_Model_Subcategoria::aprovarSegmento($this->_getParam('id'));
                $this->_redirect('admin/revisao');
                break;
            case 'ITEM':
                Admin_Model_Produto::aprovarProduto($this->_getParam('id'));
                $this->_redirect('admin/revisao');
                break;
            default:
                break;
        }
    }
}