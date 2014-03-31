<?php

class Admin_Model_Preferencias
{

    public static function compra($id){
        $dbPreferenciaCompra = new Admin_Model_DbTable_PreferenciasCompra();
        $select = $dbPreferenciaCompra->select()
                ->distinct('Tipo')
                ->from('preferenciasCompra')
                ->where('pessoa = ?', $id);
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
    
    public static function venda($id){
        $dados = array();
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeVenda();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeVenda', array('tipo'))
                ->distinct('tipo')
                ->where('pessoa = ?', $id);
        $stmt = $select->query();
        $tipos =  $stmt->fetchAll();
        
        foreach($tipos as $key => $valor){
            $select = $dbPreferenciaVenda->select()
                    ->from('preferenciasDeVenda', array('categoria'))
                    ->distinct('tipo')
                    ->where('pessoa = ?', $id)
                    ->where('tipo = ?', $valor);
            $stmt = $select->query();
            $categorias =  $stmt->fetchAll();
            $dadosCategorias = $categorias;
            foreach ($dadosCategorias as $key => $value) {
                $select = $dbPreferenciaVenda->select()
                    ->from('preferenciasDeVenda', array('categoria'))
                    ->distinct('tipo')
                    ->where('pessoa = ?', $id)
                    ->where('tipo = ?', $valor);
                $stmt = $select->query();
                $categorias =  $stmt->fetchAll();
                $dadosCategorias = $categorias;
            }
        }
        #$dados[$tipos]['categorias']= $dadosCategorias;
    }

}

