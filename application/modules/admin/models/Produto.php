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
    public static function pesquisaProduto($idProduto = null, $subcategoria = null){
            $dbProduto = new Admin_Model_DbTable_Produto();
            $selectProduto = $dbProduto->select()
                    ->from('produto');
            if($idProduto != null){
                $selectProduto->where('id = ?', $idProduto);
            }
            if($subcategoria !=null){
                $selectProduto->where('categoria = ?', $subcategoria);
            }
            $selectProduto->where('status = ?', 1);
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
//    public function pesquisaProdutoFornece($idUsuario,$subCategoria = null){
//        $dbProduto = new Admin_Model_DbTable_FornecedorProduto();
//        $selectProduto = $dbProduto->select();
//        $selectProduto->setIntegrityCheck(false);
//        $selectProduto->from('fornecedorProduto')
//                ->joinInner('produto', 'fornecedorProduto.produto = produto.id')
//                ->where('fornecedor = ?',$idUsuario);
//        if($subCategoria != null){
//            $selectProduto->where('categoria = ?', $subCategoria);
//        }
//                
//        $selectProduto->order('fornecedorProduto.dtCriacao DESC');
////        $selectProduto = $dbProduto->select()
////                    ->from('fornecedorProduto')
////                    ->where('fornecedor = ?',$id)
////                    ->order('dtCriacao DESC');
//        #die($selectProduto->__toString());
//        $stmtProduto = $selectProduto->query();
//        $dadosProduto = $stmtProduto->fetchAll();
//        return $dadosProduto;
//    }
    
    public function pesquisaProdutoFornece($idUsuario){
        $dbItensFornece = new Admin_Model_DbTable_ItensVende();
        $select = $dbItensFornece->select()
                ->from('itensVende')
                ->where('Fornecedor = ?', $idUsuario);
        $stmt = $select->query();
        return $stmt->fetchAll();
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
    public static function removerProduto($id,$tipo = null,$usr = null){
        if($tipo != null){
            if(strtoupper($tipo) == 'COMPRA'){
                $db = new Admin_Model_DbTable_CompradorProduto();
            }elseif(strtoupper($tipo) == 'VENDA'){
                $db = new Admin_Model_DbTable_FornecedorProduto();
            }
            $where = array(
                'produto = ?' => $id,
                'fornecedor = ?' => $usr
            );
            $db->delete($where);
        }
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
    
    public static function addProduto($idUsuario = null, $segmento, $nome_produto){
        $dbProduto = new Admin_Model_DbTable_Produto();
        if(!is_null($idUsuario)){
            $status = 4;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => "$status"
        );
        $data['descricao'] = $nome_produto;
        $data['categoria'] = $segmento;
        try{
            return $dbProduto->insert($data);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    public static function addProdutoFornece($idUsuario, $idProduto, $preco, $quantidade, $codigo){
        $dbProdutoFornece = new Admin_Model_DbTable_FornecedorProduto();
        $data = array(
            "fornecedor"    =>  "$idUsuario",
            "produto"       =>  "$idProduto",
            "quantidade"    =>  "$quantidade" ,
            "precoItem"     =>  "$preco",
            "codigo"        =>  "$codigo"
        );
        try{
            return $dbProdutoFornece->insert($data);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    public static function addProdutoCompra($idUsuario, $idProduto, $quantidade){
        $dbProdutoCompra = new Admin_Model_DbTable_CompradorProduto();
        $data = array(
            "comprador"    =>  "$idUsuario",
            "produto"       =>  "$idProduto",
            "quantidade"    =>  "$quantidade"
        );
        try{
            return $dbProdutoCompra->insert($data);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    public static function deleteProd($tipo, $id){
        if(strtoupper($tipo) == 'COMPRA'){
            $bd = new Admin_Model_DbTable_CompradorProduto();
        }elseif(strtoupper($tipo) == 'VENDA'){
            $bd = new Admin_Model_DbTable_FornecedorProduto();
        }
        try{
            $where = $bd->getAdapter()->quoteInto("id = ?", $id);
            $bd->delete($where);
        } catch (Exception $ex) {
            die(var_dump($ex->getMessage()));
        }
    }
}