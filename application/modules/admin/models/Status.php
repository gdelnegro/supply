<?php

class Admin_Model_Status
{
    
    public static function pesquisaStatus($idStatus = null){
        $dbStatus = new Admin_Model_DbTable_Status();
        $select = $dbStatus->select()
                ->from('status');
        if($idStatus!= null){
            $select->where('id = ?', $idStatus);
        }
        $stmt = $select->query();
        $dados =  $stmt->fetchAll();
        if(isset($idStatus) && $idStatus!=null){
            return $dados[0]['descricao'];
        }else{
            return $dados;
        }
        
    }

    public static function listaStatus(){
        $dbCategoria = new Admin_Model_DbTable_Categoria();
        $select = $dbCategoria->select()
                ->from('status', array('key'=>'id','value'=>'descricao'));
        $stmt = $select->query();
        return $stmt->fetchAll();
    }

}

