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
        $modeloNoticias = new Admin_Model_Noticias();
        $videos = new Admin_Model_Midias();
        $banners = new Admin_Model_DbTable_Banners();
        
        $destaques = $anuncios->getDestaque();
        $dadosAnuncios = $modeloAnuncio->getAnuncio($tiposPreferencia, $categoriaPreferencia, $segmentosPreferencia,3);
        $dadosEventos = $modeloEventos->getEventos(null,6);
        $dadosNoticias = $modeloNoticias->getNoticia();
        $dadosVideos = $videos->pesquisaMidias(null, 2);
        $dadosBanners = $banners->fetchAll(null, null, null, 5);
        
        $this->view->dadosAnuncios = $dadosAnuncios;
        $this->view->dadosEventos = $dadosEventos;
        $this->view->destaques = $destaques;
        $this->view->dadosNoticias = $dadosNoticias;
        $this->view->dadosVideos = $dadosVideos;
        $this->view->dadosBanners = $dadosBanners;
    }


}

