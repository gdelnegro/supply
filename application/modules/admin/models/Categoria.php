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
                ->from('categoria', array('key'=>'id','value'=>'descricao'))
                ->where('id = 1');
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
    
    public static function insereCategoria($dados){
        $bdCategoria = new Admin_Model_DbTable_Categoria();
        $bdCategoriaTipo = new Admin_Model_DbTable_CategoriaTipo();        
        $tipo = $dados['Tipo'];
        unset($dados['Tipo']);
        unset($dados['Enviar']);
        $dados['status'] = 4;
        $bdCategoria->insert($dados);
        $idCategoria = $bdCategoria->getAdapter()->lastInsertId();
        
        if(is_array($tipo)){
            foreach($tipo as $key => $value){
                $data = array(
                    'categoria'  =>  $idCategoria,
                    'tipo'       =>  $value
                );
                $bdCategoriaTipo->insert($data);
            }
        }else{
            $data = array(
                'categoria'  =>  $idCategoria,
                'tipo'       =>  $tipo
            );
            
            $bdCategoriaTipo->insert($data);
        }
    }
    
    /**
     * Método que pesquisa categorias cujo cadastro ainda não foi aprovado
     * @param int $limit
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function pesquisaCategoriaPendente($limit = null){
            $dbCategoria = new Admin_Model_DbTable_Categoria();            
            $selectCategoria = $dbCategoria->select()
                    ->from('categoria', array('id','descricao','dtCriacao'))
                    ->where('status = ?',4);
            if($limit != null){
                $selectCategoria->limit($limit);
            }
            $selectCategoria->order('dtCriacao DESC');
            $stmtCategoria = $selectCategoria->query();
            $dadosCategoria = $stmtCategoria->fetchAll();
            
            return $dadosCategoria;
    }
    
    /**
     * Método estático para remoção de cadastro de categoria
     * @param int $id
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function removerCategoria($id){
        $dbCategoria = new Admin_Model_DbTable_Categoria(); 
        $where =  $dbCategoria->getAdapter()->quoteInto('id = ?', $id);
        $dbCategoria->delete($where);
    }
    
    /**
     * Método estático para aprovação de cadastro de categoria
     * @param int $id
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function aprovarCategoria($id){
        $dbCategoria = new Admin_Model_DbTable_Categoria(); 
        $data = array(
            'status'=>'1',
        );
        $where =  $dbCategoria->getAdapter()->quoteInto('id = ?', $id);
        $dbCategoria->update($data, $where);
    }
}