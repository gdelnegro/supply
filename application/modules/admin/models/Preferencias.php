<?php

class Admin_Model_Preferencias
{

    public function compra(){
        $dbPreferenciaCompra = new Admin_Model_DbTable_PreferenciasCompra();
        $select = $dbPreferenciaCompra->select()
                ->from('preferenciasCompra');
        $stmt = $select->query();
        
        return $stmt->fetchAll();
    }
    
    public function venda(){
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasVenda();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasVenda');
        $stmt = $select->query();
        return $stmt->fetchAll();
    }

}

