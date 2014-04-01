<?php

class Admin_Model_Tipo
{

    public static function listaTipo(){
        $dbCategoria = new Admin_Model_DbTable_Tipos();
        $select = $dbCategoria->select()
                ->from('tipos', array('key'=>'id','value'=>'descricao'))
                ->where('status = 1');
        $stmt = $select->query();
        return $stmt->fetchAll();                
    }
}

