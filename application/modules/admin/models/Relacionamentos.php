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
    public function pesquisaUsuario($nome){
            $selectPessoa = $this->dbPessoa->select()
                    ->from('pessoa', array('id'=>'id','nome'=>'nome','email'=>'emailContato'))
                    ->where('nome like ?', '%'.$nome.'%');
            $stmtPessoa = $selectPessoa->query();
            $dadosPessoa = $stmtPessoa->fetchAll();
            return $dadosPessoa;
    }


}

