<?php

class Admin_Model_Anuncio
{

    protected $dbAnuncio;
    
    public function __construct() {
        $this->dbAnuncio = new Admin_Model_DbTable_Anuncios();
    }
    
    public function getAnuncio($tiposPreferencia){
        return $this->dbAnuncio->anuncio($tiposPreferencia);
    }
    
    public static function visita($idAnuncio){
        
    }
    
}

