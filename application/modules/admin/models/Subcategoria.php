<?php

class Admin_Model_Subcategoria
{
    public static function pesquisaSubCategoria($idSubCategoria = null,$categoria = null){
        $dbCategoria = new Admin_Model_DbTable_SubCategoria();
        $select = $dbCategoria->select()
                ->from('subCategoria');
        if($idSubCategoria!= null){
            $select->where('id = ?', $idSubCategoria);
        }
        if($categoria != null){
            $select->where('categoria = ?', $categoria);
        }
        $sql = $select->__toString();        
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
    
    public static function listaSubCategoria($categoria=null){
        $dbCategoria = new Admin_Model_DbTable_SubCategoria();
        $select = $dbCategoria->select()
                ->from('subCategoria', array('key'=>'id','value'=>'descricao'))
                ->where('status = 1');
        if($categoria != null){
            $select->where('categoria = ?', $categoria);
        }
        $stmt = $select->query();
        $sql = $select->__toString(); 
        return $stmt->fetchAll();
    }
}

