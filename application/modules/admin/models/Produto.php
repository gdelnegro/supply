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
    
    
    public function pesquisaProdutoPendente(){
            $dbProduto = new Admin_Model_DbTable_Produto();            
            $selectProduto = $dbProduto->select()
                    ->from('produto', array('id','descricao','dtCriacao'))
                    ->where('status = ?',4)
                    ->limit(10)
                    ->order('dtCriacao DESC');
            $stmtProduto = $selectProduto->query();
            $dadosProduto = $stmtProduto->fetchAll();
            
            return $dadosProduto;
    }    
    
}
