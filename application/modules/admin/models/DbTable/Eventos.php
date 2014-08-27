<?php

class Admin_Model_DbTable_Eventos extends Zend_Db_Table_Abstract
{

    protected $_name = 'eventos';
    protected $_id = 'id_evento';


    public function getEventos($limite){
        $select = $this->_db->select();
        $select->from('eventos')
                ->where('data_inicio <= NOW()');
         $select->order('RAND()')
                ->limit($limite);
        return $this->_db->fetchAll($select);
    }
}

