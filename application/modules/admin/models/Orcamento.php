<?php

class Admin_Model_Orcamento
{
    public $nome;
    protected $idUsuario;
    public $email;
    
    public function pesquisaOrcamento($comprador, $idOrcamento = null){
            $dbOrcamento = new Admin_Model_DbTable_Orcamento();
            $dbPropostas = new Admin_Model_DbTable_Propostas();
            
            $selectOrcamento = $dbOrcamento->select()
                    ->from('orcamento')
                    ->where('comprador = ?', $comprador);
            if($idOrcamento!=null){
                $selectOrcamento->where('id = ?', $idOrcamento);
            }
                    
            $stmtOrcamento = $selectOrcamento->query();
            $dadosOrcamento = $stmtOrcamento->fetchAll();
            
            foreach($dadosOrcamento as $chave => $valor){
                
                $selectPropostas = $dbPropostas->select()
                    ->from('propostas', array('count(*) as total'))
                    ->where('orcamento = ?', $valor['id']);
                $stmtPropostas = $selectPropostas->query();
                $dadosPropostas = $stmtPropostas->fetchAll();
                $dadosOrcamento[$chave]['totalPropostas'] = $dadosPropostas[0]['total'];
            }
            
            return $dadosOrcamento;
    }
    
    public function pesquisaPropostas($idOrcamento,$idProposta = null){
            $dbPropostas = new Admin_Model_DbTable_Propostas();
                
            $selectPropostas = $dbPropostas->select()
                ->from('propostas')
                ->where('orcamento = ?', $idOrcamento);
            if($idProposta != null){
                $selectPropostas->where('id = ?', $idProposta);
            }
            
            $stmtPropostas = $selectPropostas->query();
            $dadosPropostas = $stmtPropostas->fetchAll();
            
            return $dadosPropostas;
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
    
}
