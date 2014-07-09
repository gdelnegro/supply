<?php

class Admin_Model_DbTable_Anuncios extends Zend_Db_Table_Abstract
{

    protected $_name = 'anuncios';
    protected $_primary = 'id';

    public function fetchAll($idAnuncio = null,$usuario = null){
        $select = $this->_db->select();
        $select->from('anuncios')
                ->joinInner('pessoa', 'anuncios.pessoa = pessoa.id',
                            array('nome'=>'nome'));
            if(!is_null($idAnuncio)){
                $select->where("anuncios.id = '{$idAnuncio}'");
            }if(!is_null($usuario)){
                $select->where("pessoa = '{$usuario}'");
            }
            return $this->_db->fetchAll($select);
    }

}

