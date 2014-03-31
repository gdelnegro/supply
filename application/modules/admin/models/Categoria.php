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
    
    public static function insereCategoria($tipo,$dados){
        $bdCategoria = new Admin_Model_DbTable_Categoria();
        $bdCategoriaTipo = new Admin_Model_DbTable_CategoriaTipo();        
        $tipo = $dados['tipo'];
        unset($dados['tipo']);
        unset($dados['Enviar']);
        
        $bdCategoria->insert($dados);
        $idCategoria = $bdCategoria->getAdapter()->lastInsertId();
        
        if(is_array($tipo)){
            foreach($tipo as $key => $value){
                $data = array(
                    'categoria'  =>  $idCategoria,
                    'tipo'       =>  $value
                );
                $bdPessoaEndereco->insert($data);
            }
        }else{
            $data = array(
                'categoria'  =>  $idCategoria,
                'tipo'       =>  $tipo
            );
            
            $bdPessoaEndereco->insert($data);
        }
    }
}
