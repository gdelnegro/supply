<?php

class Admin_Model_Proposta
{
    /**
     * Método responsável por "criar" uma proposta
     * @param array $dados
     * @param int $idUsuario
     * @return int
     * @author Gustavo Del Negro <gustavo@opisystem.com.br>
     * @since v0.1 
     */
    public static function insereProposta($dados, $idUsuario){
        $dbProposta = new Admin_Model_DbTable_Propostas();
        $data = array(
            'usrCriou'  =>  $idUsuario,
            'orcamento' =>  $dados['orcamento'],
            'descricao' =>  $dados['Descricao'],
            'valor'     =>  $dados['Valor']
        );
        return $dbProposta->insert($data);
    }

}

