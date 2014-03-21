<?php

class Admin_Model_Endereco
{
    
    public function pesquisaEndereco($id){
            $dbEndereco = new Admin_Model_DbTable_Endereco();            
            $dbEndereco = new Admin_Model_DbTable_Endereco();
            
            $selectEndereco = $dbEndereco->select()
                    ->from('endereco')
                    ->where('id = ?', $id);
            $stmtEndereco = $selectEndereco->query();
            $dadosEndereco = $stmtEndereco->fetchAll();

            return $dadosEndereco[0];
    }

}

