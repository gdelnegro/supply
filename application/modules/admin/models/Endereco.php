<?php

class Admin_Model_Endereco
{
    
    public function removeEndereco($id){
        $bdEndereco = new Admin_Model_DbTable_Endereco();
        #$bdEndereco->delete("endereco","idEndereco = $id");
        $where = $bdEndereco->getAdapter()->quoteInto("idEndereco = ?", $id);
        $bdEndereco->delete($where);
    }
    
    public function insereEndereco($id,$dados){
        $bdEndereco = new Admin_Model_DbTable_Endereco();
        $bdPessoaEndereco = new Admin_Model_DbTable_PessoaEndereco();
        $apelido = $dados['apelido'];
        $tipoEndereco = $dados['tipoEndereco'];
        unset($dados['apelido']);
        unset($dados['tipoEndereco']);
        unset($dados['Enviar']);
        $bdEndereco->insert($dados);
        $idEndereco = $bdEndereco->getAdapter()->lastInsertId();
        $data = array(
            'pessoa'        =>  $id,
            'endereco'      =>  $idEndereco,
            'tipoEndereco'  =>  $tipoEndereco,
            'apelido'       =>  $apelido
        );
        $bdPessoaEndereco->insert($data);
    }

}

