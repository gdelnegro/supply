<?php

class Admin_Model_DbTable_Banners extends Zend_Db_Table_Abstract
{

    protected $_name = 'banners';
    protected $_primary = 'id';

    public function fetchAll($idBanner = null,$sponsor = null,$destaque =null ,$limite = null){
        $select = $this->_db->select();
        $select->from('banners')
                ->joinLeft('pessoa', 'banners.pessoa = pessoa.id',
                            array('nome'=>'nome'))
                ->joinInner('midias', 'banners.midia = midias.id',
                            array('nome_imagem'=>'titulo','descricao_imagem'=>'descricao','link_imagem'=>'link','local'=>'local'));
            if(!is_null($idAnuncio)){
                $select->where("banners.id = '{$idAnuncio}'");
            }if(!is_null($usuario)){
                $select->where("pessoa = '{$usuario}'");
            }
            if(!is_null($destaque)){
                $select->where("destaque = '{$destaque}'");
            }
            if(!is_null($limite)){
                $select->limit($limite);
            }
            return $this->_db->fetchAll($select);
    }

}

