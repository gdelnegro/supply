<?php

class Admin_Model_Preferencias
{

    public static function compra($id){
        $dados = array();
        $dadosTipo = array();
        
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeCompra();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeCompra', array('tipo'))
                ->distinct('tipo')
                ->where('pessoa = ?', $id);
        $stmt = $select->query();
        $tipos =  $stmt->fetchAll();

        foreach($tipos as $key => $valor){
            $tipo = $valor['Tipo'];
            $select = $dbPreferenciaVenda->select()
                    ->from('preferenciasDeCompra', array('categoria'))
                    ->distinct('categoria')
                    ->where('pessoa = ?', $id)
                    ->where('tipo = ?', $tipo);
            $stmt = $select->query();
            $categorias =  $stmt->fetchAll();
            
            $dadosTipo['tipo'] = $tipo;
            
            foreach ($categorias as $key => $value) {
                $dadosSubcategorias = array();
                $categoria = $value['Categoria'];
                $select = $dbPreferenciaVenda->select()
                    ->from('preferenciasDeCompra', array('subcategoria'))
                    ->where('pessoa = ?', $id)
                    ->where('tipo = ?', $valor)
                    ->where('categoria = ?', $categoria);
                $stmt = $select->query();
                $Subcategorias =  $stmt->fetchAll();
                
                foreach($Subcategorias as $indice => $subcategoria){
                    $dadosSubcategorias[]=$subcategoria['SubCategoria'];
                }
                $dadosCategorias[$categoria] = $dadosSubcategorias;
            }
            $dadosTipo['categorias'] = $dadosCategorias;            
            $dados[]=$dadosTipo;
        }
        return $dados;
    }
    
    public static function venda($id){
        $dados = array();
        $dadosTipo = array();
        
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeVenda();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeVenda', array('tipo'))
                ->distinct('tipo')
                ->where('pessoa = ?', $id);
        $stmt = $select->query();
        $tipos =  $stmt->fetchAll();

        foreach($tipos as $key => $valor){
            $tipo = $valor['Tipo'];
            $select = $dbPreferenciaVenda->select()
                    ->from('preferenciasDeVenda', array('categoria'))
                    ->distinct('categoria')
                    ->where('pessoa = ?', $id)
                    ->where('tipo = ?', $tipo);
            $stmt = $select->query();
            $categorias =  $stmt->fetchAll();
            
            $dadosTipo['tipo'] = $tipo;
            
            foreach ($categorias as $key => $value) {
                $dadosSubcategorias = array();
                $categoria = $value['Categoria'];
                $select = $dbPreferenciaVenda->select()
                    ->from('preferenciasDeVenda', array('subcategoria'))
                    ->where('pessoa = ?', $id)
                    ->where('tipo = ?', $valor)
                    ->where('categoria = ?', $categoria);
                $stmt = $select->query();
                $Subcategorias =  $stmt->fetchAll();
                
                foreach($Subcategorias as $indice => $subcategoria){
                    $dadosSubcategorias[]=$subcategoria['SubCategoria'];
                }
                $dadosCategorias[$categoria] = $dadosSubcategorias;
            }
            $dadosTipo['categorias'] = $dadosCategorias;            
            $dados[]=$dadosTipo;
        }
        return $dados;
    }
    
    public static function salvarPreferencias($tipoPref,$dados, $usr){
        if($tipoPref == 'compra'){
            $bd = new Admin_Model_DbTable_PreferenciasCompra();
        }elseif($tipoPref == 'venda'){
            $bd = new Admin_Model_DbTable_PreferenciasVenda();
        }
        $subcategoria = $dados['subcat'];
        
        $data = array(
            'pessoa'        =>  $usr,
            'tipo'      =>  $dados['tipo'],
            'categoria'  =>  $dados['categoria'],
        );
        
        foreach($subcategoria as $value){
            $data['subcategoria'] = $value;
            $bd->insert($data);
        }
    }
}