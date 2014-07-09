<?php

class Admin_Model_Anuncio
{

    protected $dbAnuncio;
    
    public function __construct() {
        $this->dbAnuncio = new Admin_Model_DbTable_Anuncios();
    }
    
}

