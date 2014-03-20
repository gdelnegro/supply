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
        $dados = $usuario->pesquisaUsuario($this->_getParam('id'));
        $this->view->dados = $dados;
    }


}

