<?php

class Admin_Model_DbTable_TipoEndereco extends Zend_Db_Table_Abstract
{

    protected $_name = 'tipoEndereco';
    protected $_primary = 'id';
    
    
    public function getListaTipoEndereco(){
        $select = $this->_db->select()
                ->from($this->_name, array('key'=>'id','value'=>'descricao'));
        $result = $this->getAdapter()->fetchAll($select);
        
        return $result;
    }


}

