<?php
/**
 * @author Gustavo Del Negro <gustavo@opisystem.com.br>
 * Modelo responsável pela manipulação dos dados referentes ao relacionamento
 * entre usuários
 */
class Admin_Model_Relacionamentos
{
    private $dbPessoa;
    
    public function __construct() {
        $this->dbPessoa = new Admin_Model_DbTable_Pessoa(); 
    }
    
    /**
     * 
     * @param string $nome
     * @return array
     */
    public function pesquisaUsuario($nome){
            $selectPessoa = $this->dbPessoa->select()
                    ->from('pessoa', array('id'=>'id','nome'=>'nome','email'=>'emailContato'))
                    ->where('nome like ?', '%'.$nome.'%');
            $stmtPessoa = $selectPessoa->query();
            $dadosPessoa = $stmtPessoa->fetchAll();
            return $dadosPessoa;
    }
    
    public function adicionar($idSolicitante,$idUsuario){
        /*
         * Adicionar ao banco de dados o id do usuario logado,
         * o id do usuario que foi selecionado
         * e o tipo de relacionamento
         */
    }
    
    public function remover(){
        $id = $this->_getParam('id');
    }


}

