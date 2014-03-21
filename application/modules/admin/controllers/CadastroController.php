<?php

class Admin_CadastroController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }

    public function indexAction()
    {
        /*
         * Edita as informações do usuário logado
         */
        $usuario = new Admin_Model_Usuario();    
        $dados = $usuario->pesquisaUsuario($this->_getParam('id'),true);
        $this->view->dados = $dados;
    }
    
    public function editAction(){
        $usuario = new Admin_Model_Usuario();
        $formUsuario = new Admin_Form_Pessoa();
        $id=$this->_getParam('id');
        $dados = $usuario->pesquisaUsuario($id);
        $formUsuario->populate($dados);
        $tipoPessoa = $dados['tipoPessoa'];
        
        if($tipoPessoa == 1){
            $formTipoPessoa = new Admin_Form_PessoaFisica();
        }elseif ($tipoPessoa == 2) {
            $formTipoPessoa = new Admin_Form_PessoaJuridica();
        }
        
        $this->view->formUsuario = $formUsuario;
        $this->view->formTipoPessoa = $formTipoPessoa;
        $this->view->id = $id;
        $this->redirect("/admin/cadastro/index/id/$id");
    }
    
    public function adicionarenderecoAction(){
        $idUsuario = $this->_getParam('id');
        $formEndereco = new Admin_Form_Endereco();
        $endereco = new Admin_Model_Endereco();
        
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            
            if ( $formEndereco->isValid($data) ){
                $endereco->insereEndereco($idUsuario, $data);
            }else{                
                $this->view->erro='Dados Invalidos';
                $this->view->formEndereco = $formEndereco->populate($data);
            }
            $this->view->formEndereco = $formEndereco;
            $this->view->id = $idUsuario;
        }
        $this->view->formEndereco = $formEndereco;
        $this->view->id = $idUsuario;
    }
    
    public function editarenderecoAction(){
        $usuario = new Admin_Model_Usuario();
        $id = $this->_getParam('id');
        $formEndereco = new Admin_Form_Endereco();
        $dados = $usuario->pesquisaEndereco($id);
        $formEndereco->populate($dados[0]);
        
        $this->view->formEndereco = $formEndereco;
        $this->view->id = $id;
    }
    
    public function removerenderecoAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        $endereco = new Admin_Model_Endereco();
        $id = $this->_getParam('id');
        $endereco->removeEndereco($id);
        
    }

}

