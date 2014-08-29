<?php

class Admin_Model_Eventos
{

    protected $dbEventos;
    
    public function __construct() {
        $this->dbEventos = new Admin_Model_DbTable_Eventos();
    }
    
    public function getEventos($id,$limite){
        return $this->dbEventos->getEventos($id,$limite);
    }

}

