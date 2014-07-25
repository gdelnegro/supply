<?php

class Admin_Model_Noticias
{
    protected $dbNoticia;
    
    public function __construct() {
        $this->dbNoticia = new Admin_Model_DbTable_Noticia();
    }
    
    public function getNoticia($tiposPreferencia, $limite){
        return $this->dbNoticia->noticia($tiposPreferencia, $limite);
    }
    
}

