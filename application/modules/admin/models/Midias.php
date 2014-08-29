<?php

class Admin_Model_Midias
{

    public function pesquisaMidias($id = null,$tipo = null){
            $db = new Admin_Model_DbTable_Midias();
                
            $select = $db->select()
                ->from('midias');
            if(!is_null($id)){
                $select->where('id = ?', $id);
            }
            if(!is_null($tipo)){
                $select->where('tipo = ?', $tipo);
            }
            
            $stmt = $select->query();
            $dados = $stmt->fetchAll();
            
            return $dados;
    }
}

