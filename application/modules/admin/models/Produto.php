<?php
/**
 * Modelo responsável por manipular os dados referentes aos produtos
 * @author Gustavo Del Negro <gustavo@opisystem.com.br>
 * @since v0.1
 */
class Admin_Model_Produto
{
    /**
     *iD do usuário
     * @var int 
     */
    protected $idUsuario;
    
    /**
     * Método que pesquisa os produtos com base no id, ou na subcategoria
     * aceita um dos dois parâmetros, os dois, ou nenhum
     * @param int $idProduto
     * @param int $subcategoria
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function pesquisaProduto($idProduto = null, $subcategoria = null){
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
            if($idProduto != null){
                return $dadosProduto[0];
            }else{
                return $dadosProduto;
            }
    }
    
    /**
     * Método que pesquisa produtos cujo cadastro ainda não foi aprovado
     * @param int $limit
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
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
    
    /**
     * Método que pesquisa os produtos fornecidos pelo usuário
     * retorna um array associativo
     * @param int $id
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function pesquisaProdutoFornece($idUsuario,$subCategoria = null){
        $dbProduto = new Admin_Model_DbTable_FornecedorProduto();
        $selectProduto = $dbProduto->select();
        $selectProduto->setIntegrityCheck(false);
        $selectProduto->from('fornecedorProduto')
                ->joinInner('produto', 'fornecedorProduto.produto = produto.id')
                ->where('fornecedor = ?',$idUsuario);
        if($subCategoria != null){
            $selectProduto->where('categoria = ?', $subCategoria);
        }
                
        $selectProduto->order('fornecedorProduto.dtCriacao DESC');
//        $selectProduto = $dbProduto->select()
//                    ->from('fornecedorProduto')
//                    ->where('fornecedor = ?',$id)
//                    ->order('dtCriacao DESC');
        #die($selectProduto->__toString());
        $stmtProduto = $selectProduto->query();
        $dadosProduto = $stmtProduto->fetchAll();
        return $dadosProduto;
    }
    
    /**
     * Método que pesquisa os produtos procurados pelo usuário
     * retorna um array associativo
     * @param type $id
     * @return type
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function pesquisaProdutoCompra($id){
        $dbProduto = new Admin_Model_DbTable_CompradorProduto();
        $selectProduto = $dbProduto->select();
        $selectProduto->setIntegrityCheck(false);
        $selectProduto->from('compradorProduto')
                ->joinInner('produto', 'compradorProduto.produto = produto.id')
                ->where('comprador = ?',$id)
                ->order('compradorProduto.dtCriacao DESC');
        $stmtProduto = $selectProduto->query();
        $dadosProduto = $stmtProduto->fetchAll();
        return $dadosProduto;
    }
    
    /**
     * Método estático para remoção de cadastro de produto
     * @param int $id
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function removerProduto($id){
        $dbProduto = new Admin_Model_DbTable_Produto(); 
        $where =  $dbProduto->getAdapter()->quoteInto('id = ?', $id);
        $dbProduto->delete($where);
    }
    
    /**
     * Método estático para aprovação de cadastro de produto
     * @param int $id
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function aprovarProduto($id){
        $dbProduto = new Admin_Model_DbTable_Produto(); 
        $data = array(
            'status'=>'1',
        );
        $where =  $dbProduto->getAdapter()->quoteInto('id = ?', $id);
        $dbProduto->update($data, $where);
    }
    
}
