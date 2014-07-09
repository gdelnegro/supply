<?php

class Admin_Model_Tipo
{

    public function fetchAll(){
        $dbCategoria = new Admin_Model_DbTable_Tipos();
        return $dbCategoria->fetchAll();
    }
    public static function listaTipo(){
        $dbCategoria = new Admin_Model_DbTable_Tipos();
        $select = $dbCategoria->select()
                ->from('tipos', array('key'=>'id','value'=>'descricao'))
                ->where('status = 1');
        $stmt = $select->query();
        return $stmt->fetchAll();                
    }
    
    public static function getId($nome){
        $dbCategoria = new Admin_Model_DbTable_Tipos();
        $select = $dbCategoria->select()
                ->from('tipos', array('id'=>'id'))
                ->where('status = 1')
                ->where("descricao = '{$nome}'");
        $stmt = $select->query();
        $dados = $stmt->fetchAll();
        return intval($dados[0]['id']);
    }
    
    public static function addTipo($data){
        $dbCategoria = new Admin_Model_DbTable_Tipos();
        try{
            $dbCategoria->insert($data);
        } catch (Exception $ex) {
            die(var_dump( $ex->getMessage() ));
        }
    }
}

