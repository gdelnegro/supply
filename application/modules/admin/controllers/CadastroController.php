<?php

class Admin_CadastroController extends Zend_Controller_Action
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
        /*
         * Edita as informações do usuário logado
         */
        $usuario = new Admin_Model_Usuario();    
        $dados = $usuario->pesquisaUsuario($this->_usuario->id,true);
        $this->view->dados = $dados;
    }
    
    public function editAction(){
        $usuario = new Admin_Model_Usuario();
        $formUsuario = new Admin_Form_Pessoa('edit',$this->_usuario->grupo);
        $id=$this->_getParam('id');
        $dados = $usuario->pesquisaUsuario($id);
        $formUsuario->populate($dados);
        $tipoPessoa = $dados['tipoPessoa'];
        
        if($tipoPessoa == 1){
            $formTipoPessoa = new Admin_Form_PessoaFisica();
        }elseif ($tipoPessoa == 2) {
            $formTipoPessoa = new Admin_Form_PessoaJuridica();
        }
        
        $formTipoPessoa->populate($dados['dadosTipoPessoa']);
        #die(var_dump($dados['dadosTipoPessoa']));
        
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            
            if ( $formTipoPessoa->isValid($data) ){
                $usuario->editTipoPessoa($id, $tipoPessoa, $data);
                $this->redirect("/admin/cadastro/index/");
            }else{                
                $this->view->erro='Dados Invalidos';
                $this->view->formTipoPessoa = $formTipoPessoa->populate($data);
            }
        }
        
        $this->view->formUsuario = $formUsuario;
        $this->view->formTipoPessoa = $formTipoPessoa;
    }
    
    public function adicionarenderecoAction(){
        $idUsuario = $this->_getParam('id');
        $formEndereco = new Admin_Form_Endereco();
        $endereco = new Admin_Model_Endereco();
        
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            
            if ( $formEndereco->isValid($data) ){
                $endereco->insereEndereco($idUsuario, $data);
                $this->redirect("/admin/cadastro/index/");
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
        $idEndereco = intval($this->_getParam('id'));        
        $formEndereco = new Admin_Form_Endereco();
        $dados = $usuario->pesquisaEndereco($this->_usuario->id,$idEndereco);
        $formEndereco->populate($dados[0]);
        
        $this->view->formEndereco = $formEndereco;
        $this->view->id = $idEndereco;
    }
    
    public function removerenderecoAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        $endereco = new Admin_Model_Endereco();
        $id = $this->_getParam('id');
        $endereco->removeEndereco($id);
        
    }
    
    public function showAction(){
        $controller = $this->_getParam('ctrl');
        $usuario = new Admin_Model_Usuario();
        $formUsuario = new Admin_Form_Pessoa('show',$this->_usuario->grupo);
        $id=$this->_getParam('id');
        $dados = $usuario->pesquisaUsuario($id);
        $formUsuario->populate($dados);
        $this->view->formUsuario = $formUsuario;
        $this->view->ctrl = $controller;
    }

}

