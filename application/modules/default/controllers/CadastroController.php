<?php

class Default_CadastroController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $formPessoa = new Admin_Form_Pessoa();
        $this->view->formPessoa = $formPessoa;
    }


}

