<?php
/**
 * Modelo responsável por manipular os dados referentes aos usuários
 * @author Gustavo Del Negro <gustavo@opisystem.com.br>
 * @since v0.1
 */
class Admin_Model_Usuario
{
    /**
     *
     * @var string 
     */
    public $nome;
    /**
     *
     * @var int 
     */
    protected $idUsuario;
    /**
     *
     * @var string
     */
    public $email;
    
    /**
     * Método responsável por retornar os dados do usuário
     * @param int $id
     * @param boolean $end
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1 
     */
    public function pesquisaUsuario($id,$end = false){
            $dbPessoa = new Admin_Model_DbTable_Pessoa();            
            $selectPessoa = $dbPessoa->select()
                    ->from('pessoa')
                    ->where('id = ?', $id);
            $stmtPessoa = $selectPessoa->query();
            $dadosPessoa = $stmtPessoa->fetchAll();
            $tipoPessoa = $dadosPessoa[0]['tipoPessoa'];
            if($tipoPessoa == 1){
                $dbTipoPessoa = new Admin_Model_DbTable_PessoaFisica();
                $tabelaTipoPessoa = 'pessoaFisica';
            }elseif($tipoPessoa == 2){
                $dbTipoPessoa = new Admin_Model_DbTable_PessoaJuridica();
                $tabelaTipoPessoa = 'pessoaJuridica';
            }
            $selectTipoPessoa = $dbTipoPessoa->select()
                    ->from($tabelaTipoPessoa)
                    ->where('idPessoa = ?',$id);
            $stmtTipoPessoa = $selectTipoPessoa->query();
            $dadosTipoPessoa = $stmtTipoPessoa->fetchAll();
            if($end==true){
                $dadosPessoa[0]['enderecos']=$this->pesquisaEndereco($id);
            }
            $dadosPessoa[0]['dadosTipoPessoa'] = $dadosTipoPessoa[0];
            return $dadosPessoa[0];
    }
    
    /**
     * Método responsável por "criar" um usuário
     * @param array $dados
     * @param int $tipoUsuario
     * @return int
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1 
     */
    public function insereUsuario($dados, $tipoUsuario){
        $dbPessoa = new Admin_Model_DbTable_Pessoa();
        if($tipoUsuario == 1){
            $dados['status']= 1;
        }else{
            $dados['status']= 4;
        }
        unset($dados['Enviar']);
        
        return $dbTipoPessoa->insert($dados);
    }
    
    /**
     * Método que pesquisa todos os endereços do usuário
     * retorna um array associativo
     * @param int $idUsuario
     * @param int $idEndereco
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function pesquisaEndereco($idUsuario, $idEndereco = null){
        $dbPessoaEndereco = new Admin_Model_DbTable_PessoaEndereco();
        $dbEndereco = new Admin_Model_DbTable_Endereco();
        $dbTipoEndereco = new Admin_Model_DbTable_TipoEndereco();
        
        $selectPessoaEndereco = $dbPessoaEndereco->select()
                    ->from('pessoaEndereco');
        if($idEndereco == null){
            $selectPessoaEndereco->where('pessoa = ?', $idUsuario);
        }else{
            $selectPessoaEndereco->where('pessoa = ?', $idUsuario)
                    ->where('endereco = ?', $idEndereco);
        }
            $stmtPessoaEndereco = $selectPessoaEndereco->query();
            $dadosPessoaEndereco = $stmtPessoaEndereco->fetchAll();               
            $enderecos = array();
            $numeroRegistros = count($dadosPessoaEndereco);
            for($i=0;$i<$numeroRegistros;$i++){
                $selectEndereco = $dbEndereco->select()
                        ->from('endereco')
                        ->where('idEndereco = ?', $dadosPessoaEndereco[$i]['endereco']);
                $stmtEndereco = $selectEndereco->query();
                $endereco=$stmtEndereco->fetchAll();
                $selectTipoEndereco = $dbTipoEndereco->select()
                        ->from('tipoEndereco',array('descricao'))
                        ->where('id = ?', $dadosPessoaEndereco[$i]['tipoEndereco']);
                $stmtTipoEndereco = $selectTipoEndereco->query();
                $tipoEndereco = $stmtTipoEndereco->fetchAll();
                $enderecos[$i]=$endereco[0];
                $enderecos[$i]['tipoEndereco'] = $tipoEndereco[0]['descricao'];
                $enderecos[$i]['apelido'] = $dadosPessoaEndereco[$i]['apelido'];
            }
            return $enderecos;
    }
    
    /**
     * Método responsável pela edição dos dados do tipo de pessoa(física ou jurídica)
     * do usuário.
     * @param int $idUsuario
     * @param int $tipoPessoa
     * @param array $dados
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function editTipoPessoa($idUsuario, $tipoPessoa, $dados){
        if($tipoPessoa == 1){
            $dbTipoPessoa = new Admin_Model_DbTable_PessoaFisica();
        }elseif($tipoPessoa == 2){
            $dbTipoPessoa = new Admin_Model_DbTable_PessoaJuridica();
        }
        unset($dados['Enviar']);
        $dados['idPessoa']=$idUsuario;
        $where = $dbTipoPessoa->getAdapter()->quoteInto('idPessoa = ?', $idUsuario);
        $dbTipoPessoa->update($dados, $where);
    }
    
    /**
     * Método responsável por inserir as informações referentes ao tipo de pessoa do usuário;
     * @param id $idUsuario
     * @param id $tipoPessoa
     * @param array $dados
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function insereTipoPessoa($idUsuario, $tipoPessoa, $dados){
        if($tipoPessoa == 1){
            $dbTipoPessoa = new Admin_Model_DbTable_PessoaFisica();
        }elseif($tipoPessoa == 2){
            $dbTipoPessoa = new Admin_Model_DbTable_PessoaJuridica();
        }
        unset($dados['Enviar']);
        $dados['idPessoa']=$idUsuario;
        $dbTipoPessoa->insert($dados);
    }
    
    /**
     * Método responsável por pesquisar usuários cujo cadastro está pendente
     * retorna um array associativo com todos os usuários que atenderem ao critério
     * descrito acima
     * @param int $limit
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function pesquisaUsuarioPendente($limit = null){
            $dbPessoa = new Admin_Model_DbTable_Pessoa();            
            $selectPessoa = $dbPessoa->select()
                    ->from('pessoa', array('id','nome','dtCriacao'))
                    ->where('status = ?',4);
            if($limit != null){
                $selectPessoa->limit($limit);
            }
                    $selectPessoa->order('dtCriacao DESC');
            $stmtPessoa = $selectPessoa->query();
            $dadosPessoa = $stmtPessoa->fetchAll();
            
            return $dadosPessoa;
    }
    
    /**
     * Método estático para remoção de cadastro de usuário
     * @param type $id
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function removerUsuario($id){
        $dbPessoa = new Admin_Model_DbTable_Pessoa();
        $where =  $dbPessoa->getAdapter()->quoteInto('id = ?', $id);
        $dbPessoa->delete($where);
    }
    
    /**
     * Método estático para aprovação de cadastro de usuário
     * @param type $id
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public static function aprovarUsuario($id){
        $dbPessoa = new Admin_Model_DbTable_Pessoa();
        $data = array(
            'status'=>'1',
        );
        $where =  $dbPessoa->getAdapter()->quoteInto('id = ?', $id);
        $dbPessoa->update($data, $where);
    }
    
    public function listUsuario(){
        $dbPessoa = new Admin_Model_DbTable_Pessoa();
        $select = $dbPessoa->select();
        $select->from('pessoa', array('key'=>'id','value'=>'nome'))
                ->where('status = 1');
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
}