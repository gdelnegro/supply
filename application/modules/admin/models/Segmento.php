<?php

class Admin_Model_Segmento
{
    
    public static function listaSegmento(){
        $dbSegmento = new Admin_Model_DbTable_SubCategoria(); 
        $select = $dbSegmento->select()
                ->from('subCategoria', array('key'=>'id','value'=>'descricao'))
                ->where('id = 1');
        $stmt = $select->query();
        return $stmt->fetchAll();
    }

    /**
     * Método que pesquisa segmentos cujo cadastro ainda não foi aprovado
     * @param int $limit
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function pesquisaSegmentoPendente($limit = null){
            $dbSegmento = new Admin_Model_DbTable_SubCategoria();            
            $selectSegmento = $dbSegmento->select()
                    ->from('subCategoria', array('id','descricao','dtCriacao'))
                    ->where('status = ?',4);
            if($limit != null){
                $selectSegmento->limit($limit);
            }
            $selectSegmento->order('dtCriacao DESC');
            $stmtSegmento = $selectSegmento->query();
            $dadosSegmento = $stmtSegmento->fetchAll();
            
            return $dadosSegmento;
    }
    
    /**
     * Método estático para remoção de cadastro de segmento
     * @param int $id
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function removerSegmento($id){
        $dbSegmento = new Admin_Model_DbTable_SubCategoria(); 
        $where =  $dbSegmento->getAdapter()->quoteInto('id = ?', $id);
        $dbSegmento->delete($where);
    }
    
    /**
     * Método estático para aprovação de cadastro de segmentos
     * @param int $id
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function aprovarSegmento($id){
        $dbSegmento = new Admin_Model_DbTable_SubCategoria(); 
        $data = array(
            'status'=>'1',
        );
        $where =  $dbSegmento->getAdapter()->quoteInto('id = ?', $id);
        $dbSegmento->update($data, $where);
    }
}

