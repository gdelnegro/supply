<?php

class Admin_Model_Noticias
{
    protected $dbNoticia;
    
    public function __construct() {
        $this->dbNoticia = new Admin_Model_DbTable_Noticia();
    }
    
    public function getNoticia($idNoticia, $usuario){
        return $this->dbNoticia->fetchAll($idNoticia, $usuario);
    }
    
}

