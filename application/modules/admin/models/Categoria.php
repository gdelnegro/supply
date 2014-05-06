<?php

class Admin_Model_Categoria
{

    public static function pesquisaCategoria($idCategoria = null,$tipo = null){
        $dbCategoria = new Admin_Model_DbTable_Categoria();
        $select = $dbCategoria->select()
                ->from('categoria');
        if($idCategoria!= null){
            $select->where('id = ?', $idCategoria);
        }
        if($tipo != null){
            $select->where('tipo = ?', $tipo);
        }
        $stmt = $select->query();
        return $stmt->fetchAll();
    }

    public static function listaCategoria(){
        $dbCategoria = new Admin_Model_DbTable_Categoria();
        $select = $dbCategoria->select()
                ->from('categoria', array('key'=>'id','value'=>'descricao'))
                ->where('status = 1');
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
    
    public static function listaSegmentoCategoria(){
        $dbCategoria = new Admin_Model_DbTable_Categoria();
        $select = $dbCategoria->select()
                ->from(array('c' => 'categoria'),
                        array('key'=>'id','value'=>"CONCAT(t.descricao,'-',c.descricao)")
                        )
                ->join(array('t' => 'tipos'),
                        'c.tipo = t.id',
                        array() );
        $stmt = $select->query();
        return $stmt->fetchAll();
        
    }
    
    public static function insereCategoria($dados){
        $bdCategoria = new Admin_Model_DbTable_Categoria();
        $bdCategoriaTipo = new Admin_Model_DbTable_CategoriaTipo();                
        try{
            return $bdCategoria->insert($dados);
        } catch (Exception $ex) {
            die($ex->getMessage());
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
    
    public static function getId($tipo,$nome){
        $dbCategoria = new Admin_Model_DbTable_Categoria();
        $select = $dbCategoria->select()
                ->from('categoria', array('id'=>'id'))
                ->where('status = 1')
                ->where("descricao = '{$nome}'")
                ->where("tipo = '{$tipo}'");
        $stmt = $select->query();
        $dados = $stmt->fetchAll();
        return intval($dados[0]['id']);
    }
}