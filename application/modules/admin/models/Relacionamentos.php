<?php
/**
 * @author Gustavo Del Negro <gustavo@opisystem.com.br>
 * Modelo responsável pela manipulação dos dados referentes ao relacionamento
 * entre usuários
 */
class Admin_Model_Relacionamentos
{
    private $dbPessoa;
    private $dbRelacionamento;
    private $viewRelacionamento;
    private $dbTipoRelacionamento;
    
    public function __construct() {
        $this->dbPessoa = new Admin_Model_DbTable_Pessoa(); 
        $this->dbRelacionamento = new Admin_Model_DbTable_Relacionamentos();
        $this->viewRelacionamento = new Admin_Model_DbTable_ViewRelacionamentos();
        $this->dbTipoRelacionamento = new Admin_Model_DbTable_TipoRelacionamento();
    }
    
    /**
     * 
     * @param string $nome
     * @return array
     */
    public function pesquisaUsuario($nome, $idUsuario){
            $selectPessoa = $this->dbPessoa->select()
                    ->from('pessoa', array('id'=>'id','nome'=>'nome','email'=>'emailContato'))
                    ->where('nome like ?', '%'.$nome.'%')
                    ->where('id <> ?', $idUsuario);
            $stmtPessoa = $selectPessoa->query();
            $dadosPessoa = $stmtPessoa->fetchAll();
            return $dadosPessoa;
    }
    
    /**
     * 
     * @param int $idSolicitante
     * @param int $idUsuario
     * @param int $tipoRelacionamento
     */
    public function adicionar($idSolicitante,$idUsuario, $tipoRelacionamento){
        /*
         * Adicionar ao banco de dados o id do usuario logado,
         * o id do usuario que foi selecionado
         * e o tipo de relacionamento
         */
        $date = date('Y-m-d h:i:s');
        $data = array(
            'origem' => $idSolicitante,
            'destino' => $idUsuario,
            'dtRelacionamento' => $date, 
            'status' => '2',
            'tipoRelacionamento' => $tipoRelacionamento
        );
        try{
            $this->dbRelacionamento->insert($data);
        } catch (Exception $ex) {
            if($ex->getCode() == '23000'){
                $mensagem = 'Relacionamento já feito';
                return $mensagem ;
            }
        }
    }
    
    public function remover(){
        $id = $this->_getParam('id');
    }
    
    /**
     * 
     * @param type $idUsuario
     * @param type $destino
     * @return type
     */
    public function buscaRelacionamento($idUsuario,$destino = null,$tipoRelacionamento = null){
        $selectRelacionamento = $this->viewRelacionamento->select()
                    ->from('viewRelacionamentos'
                            )
                    ->where('status = ?', '2')
                    ->where('origem =?', $idUsuario);
        if(!is_null($destino)){
            $selectRelacionamento->where('destino = ?', $destino);
        }
        if(!is_null($tipoRelacionamento)){
            $selectRelacionamento->where('tipoRelacionamento = ?', $tipoRelacionamento);
        }
        
        $stmtRelacionamento = $selectRelacionamento->query();
        $dadosRelacionamento = $stmtRelacionamento->fetchAll();
        return $dadosRelacionamento;
    }
    
    public function listaTipoRelacionamento(){
        $selectTipoRelacionamento = $this->dbTipoRelacionamento->select()
                ->from('tipoRelacionamento',
                        array('key'=>'id','value'=>'descricao'));
        $stmt = $selectTipoRelacionamento->query();
        $dados = $stmt->fetchAll();
        return $dados;
    }
    
    public function removeRelacionamento($idUsuario, $idRelacionamento){
        $where = array(
                'origem = ?' => $idUsuario,
                'idRelacionamento = ?' => $idRelacionamento
            );
        $this->dbRelacionamento->delete($where);
    }


}

