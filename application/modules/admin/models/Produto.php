<?php

class Admin_Model_Produto
{
    protected $idUsuario;
    
    public function pesquisaProduto($idProduto = null, $subcategoria){
            $dbProduto = new Admin_Model_DbTable_Produto();
            $selectProduto = $dbProduto->select()
                    ->from('produto');
            if($idProduto != null){
                $selectProduto->where('id = ?', $idProduto);
            }
            if($subcategoria !=null){
                $selectProduto->where('subcategoria = ?', $subcategoria);
            }
            $stmtProduto = $selectProduto->query();
            $dadosProduto = $stmtProduto->fetchAll();
            return $dadosProduto;
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
