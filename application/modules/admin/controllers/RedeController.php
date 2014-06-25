<?php

class Admin_RedeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
        $nomeUsuario = $this->_getParam('nome');
        if($nomeUsuario!=''){
            $relacionamento = new Admin_Model_Relacionamentos();
            $resultadoBusca = $relacionamento->pesquisaUsuario($nomeUsuario);
            if($resultadoBusca){
                $this->view->dados = $resultadoBusca;
            }
            
        }
    }


}
