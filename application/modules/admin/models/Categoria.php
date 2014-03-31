<?php

class Admin_Model_Categoria
{

    public static function pesquisaCategoria($idCategoria = null){
        $dbCategoria = new Admin_Model_DbTable_Categoria();
        $select = $dbCategoria->select()
                ->from('categoria');
        if($idCategoria!= null){
            $select->where('id = ?', $idCategoria);
        }
        $stmt = $select->query();
        return $stmt->fetchAll();
    }

    public static function listaCategoria(){
        $dbCategoria = new Admin_Model_DbTable_Categoria();
        $select = $dbCategoria->select()
                ->from('categoria', array('key'=>'id','value'=>'descricao'));
        $stmt = $select->query();
        return $stmt->fetchAll();
    }

}

