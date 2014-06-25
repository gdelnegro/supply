<?php

class Admin_RedeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        /*
         * gerar array com dados dos contatos fornecedores
         * gerar array com dados dos contatos clientes
         */
        if($this->getRequest()->getMethod() == 'POST'){
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
    
    public function adicionarAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        $idUsuario = $this->_getParam('id');
    }


}

