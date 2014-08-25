<?php

class Admin_Model_DbTable_Anuncios extends Zend_Db_Table_Abstract
{

    protected $_name = 'anuncios';
    protected $_primary = 'id';

    public function fetchAll($idAnuncio = null,$usuario = null){
        $select = $this->_db->select();
        $select->from('anuncios')
                ->joinLeft('pessoa', 'anuncios.pessoa = pessoa.id',
                            array('nome'=>'nome'))
                ->joinInner('midias', 'anuncios.midia = midias.id',
                            array('nome_imagem'=>'titulo','descricao_imagem'=>'descricao','link_imagem'=>'link','local'=>'local'));
            if(!is_null($idAnuncio)){
                $select->where("anuncios.id = '{$idAnuncio}'");
            }if(!is_null($usuario)){
                $select->where("pessoa = '{$usuario}'");
            }
            return $this->_db->fetchAll($select);
    }
    
    public function anuncio($tiposPreferencia = null, $categoriaPreferencia = null, $segmentosPreferencia = null, $limite){
        $select = $this->_db->select();
        $select->from('anuncios')
                ->joinLeft('pessoa', 'anuncios.pessoa = pessoa.id',
                            array('nome'=>'nome'))
                ->joinInner('midias', 'anuncios.midia = midias.id',
                            array('nome_imagem'=>'titulo','descricao_imagem'=>'descricao','link_imagem'=>'link','local'=>'local'))
                ->where('ativo = 1');
        if(!is_null($tiposPreferencia)){
            $select->orWhere('anuncios.tipo IN (?)', $tiposPreferencia);
        }       
        if(!is_null($categoriaPreferencia)){
            $select->orWhere('categoria IN (?)', $categoriaPreferencia);
        }
        if(!is_null($segmentosPreferencia)){
            $select->orWhere('segmento IN (?)', $segmentosPreferencia);
        }
         $select->order('RAND()')
                ->limit($limite);
        return $this->_db->fetchAll($select);
    }
    
    public function getDestaque(){
        $select = $this->_db->select();
        $select->from('anuncios')
                ->joinLeft('pessoa', 'anuncios.pessoa = pessoa.id',
                            array('nome'=>'nome'))
                ->joinInner('midias', 'anuncios.midia = midias.id',
                            array('nome_imagem'=>'titulo','descricao_imagem'=>'descricao','link_imagem'=>'link','local'=>'local'))
                ->where('ativo = 1')
                ->where('destaque = 1');
            return $this->_db->fetchAll($select);
    }

}

