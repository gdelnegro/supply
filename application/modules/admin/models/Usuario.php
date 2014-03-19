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
            
            
            $selectPessoa = $dbPessoa->select()
                    ->from('pessoa')
                    ->where('id = ?', $id)
                    ->limit(1);
            $stmtPessoa = $selectPessoa->query();
            $dadosPessoa = $stmtPessoa->fetchAll();
            
            $selectPessoaEndereco = $dbPessoaEndereco->select()
                    ->from('pessoaEndereco')
                    ->where('pessoa = ?', $id);
            $stmtPessoaEndereco = $selectPessoaEndereco->query();
            $dadosPessoaEndereco = $stmtPessoaEndereco->fetchAll();            
            
            $enderecos = array();
            
            foreach($dadosPessoaEndereco as $key => $matriz){
                foreach($matriz as $chave=>$valor){
                        $selectEndereco = $dbEndereco->select()
                                ->from('endereco')
                                ->where('idEndereco = ?', $matriz['endereco']);
                        $stmtEndereco = $selectEndereco->query();
                        $enderecos[0]=$stmtEndereco->fetchAll();
                }
            }
            $dadosPessoa[0]['enderecos']=$enderecos;
            return $dadosPessoa[0];
    }    

}

