<?php

class Default_CadastroController extends Zend_Controller_Action
{
    
    public function init()
    {
    }

    public function indexAction()
    {
        $formPessoa = new Admin_Form_Pessoa('new', 0);
        $this->view->formPessoa = $formPessoa;
    }


}

