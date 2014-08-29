<?php

class Admin_Model_DbTable_Eventos extends Zend_Db_Table_Abstract
{

    protected $_name = 'eventos';
    protected $_id = 'id_evento';


    public function getEventos($id = null,$limite=null){
        $select = $this->_db->select();
        $select->from('eventos')
                ->where('data_inicio <= NOW()');
        if(!is_null($id)){
            $select->where("id_evento = $id");
        }
         $select->order('RAND()')
                ->limit($limite);
        return $this->_db->fetchAll($select);
    }
}

