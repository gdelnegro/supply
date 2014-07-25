<?php

class Admin_Model_DbTable_Noticia extends Zend_Db_Table_Abstract
{

    protected $_name = 'noticias';
    protected $_primary = 'idnoticia';

    public function fetchAll($idNoticia = null,$usuario = null){
        $select = $this->_db->select();
        $select->from('noticias')
                ->joinLeft('pessoa', 'noticias.patrocinador = pessoa.id',
                            array('nome'=>'nome'))
                ->joinLeft('midias', 'noticias.midia = midias.id',
                            array('nome_imagem'=>'titulo','descricao_imagem'=>'descricao','link_imagem'=>'link','local'=>'local'));
            if(!is_null($idNoticia)){
                $select->where("noticias.idnoticia = '{$idNoticia}'");
            }if(!is_null($usuario)){
                $select->where("pessoa = '{$usuario}'");
            }
            return $this->_db->fetchAll($select);
    }
    
    public function anuncio($tiposPreferencia = null, $limite){
        $select = $this->_db->select();
        $select->from('noticias')
                ->joinLeft('pessoa', 'noticias.patrocinador = pessoa.id',
                            array('nome'=>'nome'))
                ->joinLeft('midias', 'noticias.midia = midias.id',
                            array('nome_imagem'=>'titulo','descricao_imagem'=>'descricao','link_imagem'=>'link','local'=>'local'))
                ->where('ativo = 1');
        if(!is_null($tiposPreferencia)){
            $select->where('categoria IN (?)', $tiposPreferencia);
        }       
         $select->order('RAND()')
                ->limit($limite);
        return $this->_db->fetchAll($select);
    }
    
    public function getDestaque(){
        $select = $this->_db->select();
        $select->from('noticias')
                ->joinLeft('pessoa', 'noticias.patrocinador = pessoa.id',
                            array('nome'=>'nome'))
                ->joinInner('midias', 'noticias.midia = midias.id',
                            array('nome_imagem'=>'titulo','descricao_imagem'=>'descricao','link_imagem'=>'link','local'=>'local'))
                ->where('ativo = 1')
                ->where('destaque = 1');
            return $this->_db->fetchAll($select);
    }


}

