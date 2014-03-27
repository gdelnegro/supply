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
    
    
    public function pesquisaProdutoPendente($limit = null){
            $dbProduto = new Admin_Model_DbTable_Produto();            
            $selectProduto = $dbProduto->select()
                    ->from('produto', array('id','descricao','dtCriacao'))
                    ->where('status = ?',4);
            if($limit != null){
                $selectProduto->limit($limit);
            }
                    $selectProduto->order('dtCriacao DESC');
            $stmtProduto = $selectProduto->query();
            $dadosProduto = $stmtProduto->fetchAll();
            
            return $dadosProduto;
    }    
    
    public function pesquisaProdutoFornece($id){
        $dbProduto = new Admin_Model_DbTable_FornecedorProduto();
        $selectProduto = $dbProduto->select()
                    ->from('fornecedorProduto')
                    ->where('fornecedor = ?',$id)
                    ->order('dtCriacao DESC');
            $stmtProduto = $selectProduto->query();
            $dadosProduto = $stmtProduto->fetchAll();
            return $dadosProduto;
    }
    
    public function pesquisaProdutoCompra($id){
        $dbProduto = new Admin_Model_DbTable_CompradorProduto();
        $selectProduto = $dbProduto->select()
                    ->from('compradorProduto')
                    ->where('comprador = ?',$id)
                    ->order('dtCriacao DESC');
            $stmtProduto = $selectProduto->query();
            $dadosProduto = $stmtProduto->fetchAll();
            return $dadosProduto;
    }
    
}
