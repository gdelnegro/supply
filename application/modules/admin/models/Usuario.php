<?php

class Admin_Model_Usuario
{
    public $nome;
    protected $idUsuario;
    public $email;
    
    public function pesquisaUsuario($id,$end = false){
            $dbPessoa = new Admin_Model_DbTable_Pessoa();            
            
            $selectPessoa = $dbPessoa->select()
                    ->from('pessoa')
                    ->where('id = ?', $id);
            $stmtPessoa = $selectPessoa->query();
            $dadosPessoa = $stmtPessoa->fetchAll();
            
            $tipoPessoa = $dadosPessoa[0]['tipoPessoa'];
            
            if($tipoPessoa == 1){
                $dbTipoPessoa = new Admin_Model_DbTable_PessoaFisica();
                $tabelaTipoPessoa = 'pessoaFisica';
            }elseif($tipoPessoa == 2){
                $dbTipoPessoa = new Admin_Model_DbTable_PessoaJuridica();
                $tabelaTipoPessoa = 'pessoaJuridica';
            }
            
            $selectTipoPessoa = $dbTipoPessoa->select()
                    ->from($tabelaTipoPessoa)
                    ->where('idPessoa = ?',$id);
            $stmtTipoPessoa = $selectTipoPessoa->query();
            $dadosTipoPessoa = $stmtTipoPessoa->fetchAll();

            if($end==true){
                $dadosPessoa[0]['enderecos']=$this->pesquisaEndereco($id);
            }
            $dadosPessoa[0]['dadosTipoPessoa'] = $dadosTipoPessoa;
            return $dadosPessoa[0];
    }
    
    public function pesquisaEndereco($idUsuario, $idEndereco = null){
        $dbPessoaEndereco = new Admin_Model_DbTable_PessoaEndereco();
        $dbEndereco = new Admin_Model_DbTable_Endereco();
        $dbTipoEndereco = new Admin_Model_DbTable_TipoEndereco();
        
        $selectPessoaEndereco = $dbPessoaEndereco->select()
                    ->from('pessoaEndereco');
        if($idEndereco == null){
            $selectPessoaEndereco->where('pessoa = ?', $idUsuario);
        }else{
            $selectPessoaEndereco->where('pessoa = ?', $idUsuario)
                    ->where('endereco = ?', $idEndereco);
        }
                    
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
                $enderecos[$i]['apelido'] = $dadosPessoaEndereco[$i]['apelido'];
            }
            return $enderecos;
    }
    
    public function editTipoPessoa($idUsuario, $tipoPessoa, $dados){
        if($tipoPessoa == 1){
            $dbTipoPessoa = new Admin_Model_DbTable_PessoaFisica();
        }elseif($tipoPessoa == 2){
            $dbTipoPessoa = new Admin_Model_DbTable_PessoaJuridica();
        }
        unset($dados['Enviar']);
        $dados['idPessoa']=$idUsuario;
        $dbTipoPessoa->insert($dados);
    }
    
    public function pesquisaUsuarioPendente(){
            $dbPessoa = new Admin_Model_DbTable_Pessoa();            
            $selectPessoa = $dbPessoa->select()
                    ->from('pessoa', array('id','nome','dtCriacao'))
                    ->where('status = ?',4)
                    ->limit(10)
                    ->order('dtCriacao DESC');
            $stmtPessoa = $selectPessoa->query();
            $dadosPessoa = $stmtPessoa->fetchAll();
            
            return $dadosPessoa;
    }
    
    public static function removerUsuario($id){
        $dbPessoa = new Admin_Model_DbTable_Pessoa();
        $where =  $dbPessoa->getAdapter()->quoteInto('id = ?', $id);
        $dbPessoa->delete($where);
    }
    
    public static function aprovarUsuario($id){
        $dbPessoa = new Admin_Model_DbTable_Pessoa();
        $data = array(
            'status'=>'1',
        );
        $where =  $dbPessoa->getAdapter()->quoteInto('id = ?', $id);
        $dbPessoa->update($data, $where);
    }
    
}