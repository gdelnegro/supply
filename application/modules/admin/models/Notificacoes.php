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
    
    public function add($idUsuario, $idNotificacao){
        
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
        
    }

}

