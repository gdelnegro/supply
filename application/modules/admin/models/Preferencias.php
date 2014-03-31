<?php

class Admin_Model_Preferencias
{

    public static function compra($id){
        $dbPreferenciaCompra = new Admin_Model_DbTable_PreferenciasDeCompra();
        $select = $dbPreferenciaCompra->select()
                ->from('preferenciasDeCompra')
                ->where('pessoa = ?', $id);
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
    
    public static function venda($id){
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeVenda();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeVenda')
                ->where('pessoa = ?', $id);
        $stmt = $select->query();
        return $stmt->fetchAll();
    }

}

