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
        $dados = $usuario->pesquisaUsuario(1,true);
        $this->view->dados = $dados;
    }
    
    public function editAction(){
        $usuario = new Admin_Model_Usuario();
        $formUsuario = new Admin_Form_Pessoa();
        $dados = $usuario->pesquisaUsuario($this->_getParam('id'));
        $formUsuario->populate($dados);
        $tipoPessoa = $dados['tipoPessoa'];
        
        if($tipoPessoa == 1){
            $formTipoPessoa = new Admin_Form_PessoaFisica();
        }elseif ($tipoPessoa == 2) {
            $formTipoPessoa = new Admin_Form_PessoaJuridica();
        }
        
        $this->view->formUsuario = $formUsuario;
        $this->view->formTipoPessoa = $formTipoPessoa;
        $this->view->dados = $tipoPessoa;
    }


}

