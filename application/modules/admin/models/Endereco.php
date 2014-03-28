<?php
/**
 * Modelo responsável pela manipulação dos dados referentes ao endereço
 * @author Gustavo Del Negro <gustavo@opisystem.com.br>
 * @since v0.1
 */
class Admin_Model_Endereco
{
    
    /**
     * Método para exclusão de endereço
     * @param int $id
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function removeEndereco($id){
        $bdEndereco = new Admin_Model_DbTable_Endereco();
        $where = $bdEndereco->getAdapter()->quoteInto("idEndereco = ?", $id);
        $bdEndereco->delete($where);
    }
    
    /**
     * Método para inserção de endereço no banco de dados
     * @param int $id
     * @param array $dados
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function insereEndereco($id,$dados){
        $bdEndereco = new Admin_Model_DbTable_Endereco();
        $bdPessoaEndereco = new Admin_Model_DbTable_PessoaEndereco();
        $apelido = $dados['apelido'];
        $tipoEndereco = $dados['tipoEndereco'];
        unset($dados['apelido']);
        unset($dados['tipoEndereco']);
        unset($dados['Enviar']);
        $bdEndereco->insert($dados);
        $idEndereco = $bdEndereco->getAdapter()->lastInsertId();
        $data = array(
            'pessoa'        =>  $id,
            'endereco'      =>  $idEndereco,
            'tipoEndereco'  =>  $tipoEndereco,
            'apelido'       =>  $apelido
        );
        $bdPessoaEndereco->insert($data);
    }
    
    /**
     * Método que lista os tipos de endereço, e os retorna em forma de matriz associativa
     * @return array
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1
     */
    public function getListaTipoEndereco(){
        $bdEndereco = new Admin_Model_DbTable_TipoEndereco();
        $select = $bdEndereco->select()
                ->from('tipoEndereco', array('key'=>'id','value'=>'descricao'));
        $stmt = $select->query();
        $result = $stmt->fetchAll();
        return $result;
    }

}

