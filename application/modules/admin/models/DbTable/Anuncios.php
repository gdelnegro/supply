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
    
    public function anuncio($tiposPreferencia = null){
        $select = $this->_db->select();
        $select->from('anuncios')
                ->joinLeft('pessoa', 'anuncios.pessoa = pessoa.id',
                            array('nome'=>'nome'))
                ->joinInner('midias', 'anuncios.midia = midias.id',
                            array('nome_imagem'=>'titulo','descricao_imagem'=>'descricao','link_imagem'=>'link','local'=>'local'))
                ->where('ativo = 1');
        if(!is_null($tiposPreferencia)){
            $select->where('categoria IN (?)', $tiposPreferencia);
        }       
         $select->order('RAND()')
                ->limit('6');
        return $this->_db->fetchAll($select);
    }
    
    public function visita($idAnuncio){
        $this->update(array(
            'acessos' => new Zend_Db_Expr('acessos + 1')
            ), 'value < 10');
    }

}

