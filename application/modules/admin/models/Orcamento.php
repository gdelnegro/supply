<?php
/**
 * Modelo responsável por manipular os dados referentes aos orçamentos
 * @author Gustavo Del Negro <gustavo@opisystem.com.br>
 * @since v0.1
 */
class Admin_Model_Orcamento
{    
    /**
     * Método responsável por pesquisar orçamentos
     * retorna um array associativo com os dados do orçamento
     * @param int $comprador
     * @param int $idOrcamento
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
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
            
            if($idOrcamento!=null){
                return $dadosOrcamento[0];
            }else{
                return $dadosOrcamento;
            }
            
    }
    
    /**
     * Método responsável por "criar" um orçamento
     * @param array $dados
     * @param int $idUsuario
     * @return int
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1 
     */
    public function insereOrcamento($dados, $idUsuario){
        $dbOrcamento = new Admin_Model_DbTable_Orcamento();
        $data = array(
            'comprador' =>  $idUsuario,
            'descricao' =>  $dados['descricao']
        );
        return $dbOrcamento->insert($data);
    }
    
    /**
     * Método responsável por pesquisar as propostas recebidas
     * @param int $idOrcamento
     * @param int $idProposta
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
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
    
    public function inserePropostas(){
        
    }
    
    /**
     * Método responsável por adicionar produtos ao orçamento
     * @param int $idOrcamento
     * @param int $idProduto
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function insereProdutos($idOrcamento, $idProduto, $quantidade){
        $dbOrcamentoProduto = new Admin_Model_DbTable_OrcamentoProduto();
        $data = array(
            'orcamento'     =>  $idOrcamento,
            'produto'       =>  $idProduto,
            'quantidade'    =>  $quantidade
        );
        $dbOrcamentoProduto->insert($data);
    }
    
    /**
     * Método responsável pela pesquisa dos produtos atrelados ao orçamento
     * @param int $idOrcamento
     * @return array
     */
    public function pesquisaProdutos($idOrcamento){       
        $dbOrcamentoProduto = new Admin_Model_DbTable_OrcamentoProduto();
        $selectProdutosOrcamento = $dbOrcamentoProduto->select()
                ->from('orcamentoProduto')
                ->where('orcamento = ?', $idOrcamento);
        $stmtProdutosOrcamento = $selectProdutosOrcamento->query();
        $dadosProdutos = $stmtProdutosOrcamento->fetchAll();
        return $dadosProdutos;
    }
    
}
