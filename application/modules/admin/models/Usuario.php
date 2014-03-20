<?php

class Admin_Model_Usuario
{
    public $nome;
    protected $id;
    public $email;
    
    public function pesquisaUsuario($id){
            $dbPessoaEndereco = new Admin_Model_DbTable_PessoaEndereco();
            $dbEndereco = new Admin_Model_DbTable_Endereco();
            $dbPessoa = new Admin_Model_DbTable_Pessoa();
            $dbTipoEndereco = new Admin_Model_DbTable_TipoEndereco();
            
            $selectPessoa = $dbPessoa->select()
                    ->from('pessoa')
                    ->where('id = ?', $id);
            $stmtPessoa = $selectPessoa->query();
            $dadosPessoa = $stmtPessoa->fetchAll();
            
            $selectPessoaEndereco = $dbPessoaEndereco->select()
                    ->from('pessoaEndereco')
                    ->where('pessoa = ?', $id);
            $stmtPessoaEndereco = $selectPessoaEndereco->query();
            $dadosPessoaEndereco = $stmtPessoaEndereco->fetchAll();            
            
            $enderecos = array();
            $numeroRegistros = count($dadosPessoaEndereco);
            
            for($i=0;$i<$numeroRegistros;$i++){
                $selectEndereco = $dbEndereco->select()
                        ->from('endereco')
                        ->where('idEndereco = ?', $dadosPessoaEndereco[$i]['endereco']);
                $stmtEndereco = $selectEndereco->query();
                $endereco=$stmtEndereco->fetchAll();
                
                $selectTipoEndereco = $dbTipoEndereco->select()
                        ->from('tipoEndereco',array('descricao'))
                        ->where('id = ?', $dadosPessoaEndereco[$i]['tipoEndereco']);
                $stmtTipoEndereco = $selectTipoEndereco->query();
                $tipoEndereco = $stmtTipoEndereco->fetchAll();
                $enderecos[$i]=$endereco[0];
                $enderecos[$i]['tipoEndereco'] = $tipoEndereco[0]['descricao'];
            }            

            $dadosPessoa[0]['enderecos']=$enderecos;
            return $dadosPessoa[0];
    }    

}

