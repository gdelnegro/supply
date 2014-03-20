<?php

class Admin_CadastroController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
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
        
        $this->view->formUsuario = $formUsuario;
    }


}

