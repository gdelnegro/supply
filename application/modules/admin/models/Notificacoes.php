<?php

/**
 * @author Gustavo Del Negro <gustavo@opisystem.com.br>
 * Classe para manipulação de notificações
 */
class Admin_Model_Notificacoes
{

    
    private $dbNotificacoes;
    private $viewNotificacoes;
    
    public function __construct() {
        $this->dbNotificacoes = new Admin_Model_DbTable_Notificacoes();
        $this->viewNotificacoes = new Admin_Model_DbTable_Viewnotificacoes();
    }
    
    /**
     * 
     * @param type $idUsuario
     * @param type $texto
     * @return boolean
     */
    public static function add($idUsuario, $texto){
        $date = date('Y-m-d h:i:s');
        $dbNotificacoes = new Admin_Model_DbTable_Notificacoes();
        
        $data=array(
            'texto' => $texto,
            'usuario' => $idUsuario,
            'status'    => '2',
            'dtNotificacao' =>  $date
        );
        try{
            $dbNotificacoes->insert($data);
            return true;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    
    public function del($idUsuario, $idNotificacao){
        
    }
    
    /**
     * 
     * @param int $idUsuario
     * @return array
     */
    public function count($idUsuario){
        $select = $this->dbNotificacoes->select()
                ->from('notificacoes',array('count(*) as total'))
                ->where('usuario = ?', $idUsuario)
                ->where('status = 2');
        $stmt = $select->query();
        $dados = $stmt->fetchAll();
        
        return $dados;
    }
    
    public function lista($idUsuario){
        $select = $this->viewNotificacoes->select()
                ->from('viewNotificacoes')
                ->where('usuario = ?', $idUsuario);
        $stmt = $select->query();
        $dados = $stmt->fetchAll();
        return $dados;
        
    }

}

