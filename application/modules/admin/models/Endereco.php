<?php

class Admin_Model_Endereco
{
    
    public function removeEndereco($id){
        $bdEndereco = new Admin_Model_DbTable_Endereco();
        #$bdEndereco->delete("endereco","idEndereco = $id");
        $where = $bdEndereco->getAdapter()->quoteInto("idEndereco = ?", $id);
        $bdEndereco->delete($where);
    }

}

