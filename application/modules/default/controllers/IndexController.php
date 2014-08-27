<?php

class Default_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $anuncios = new Admin_Model_DbTable_Anuncios();
        $modeloAnuncio = new Admin_Model_Anuncio();
        $modeloEventos = new Admin_Model_Eventos();
        
        $destaques = $anuncios->getDestaque();
        $dadosAnuncios = $modeloAnuncio->getAnuncio(null,3);
        $dadosEventos = $modeloEventos->getEventos(6);
        
        $this->view->dadosAnuncios = $dadosAnuncios;
        $this->view->dadosEventos = $dadosEventos;
        $this->view->destaques = $destaques;
    }


}

