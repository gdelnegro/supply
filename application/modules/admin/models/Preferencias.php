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
            $tabela = "preferenciasCompra";
        }elseif($tipoPref == 'venda'){
            $bd = new Admin_Model_DbTable_PreferenciasVenda();
            $tabela = "preferenciasVenda";
        }
        $subcategoria = $dados['subcat'];
        
        $data = array(
            'pessoa'        =>  $usr,
            'tipo'      =>  $dados['tipo'],
            'categoria'  =>  $dados['categoria'],
        );
        
        foreach($subcategoria as $value){
            $data['subcategoria'] = $value;
            #var_dump($data);
            #$stmt = $bd->getAdapter()->query("REPLACE INTO ".$tabela." SET pessoa='".$data['pessoa']."', tipo='".$data['tipo']."', categoria = '".$data['categoria']."', subCategoria='".$data['categoria']."'");
            #$stmt->execute();
            try {
                $bd->insert($data);
            } catch (Exception $exc) {
                $codigo = $exc->getCode();
                #if($codigo != 2300){
                #    echo $exc->getMessage();
                #}
            }
        }
    }
    
    public static function getTipoVenda($idUsuario){
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeVenda();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeVenda', array('tipo'))
                ->distinct('tipo')
                ->where('pessoa = ?', $idUsuario);
        $stmt = $select->query();
        $tipos =  $stmt->fetchAll();
        return $tipos;
    }
    
    public static function getTipoCompra($idUsuario){
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeCompra();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeCompra', array('tipo'))
                ->distinct('tipo')
                ->where('pessoa = ?', $idUsuario);
        $stmt = $select->query();
        $tipos =  $stmt->fetchAll();
        return $tipos;
    }
    
    public static function getCategoriaVenda($idUsuario, $tipo, $categoria = null){
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeVenda();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeVenda', array('categoria'))
                ->distinct('categoria')
                ->where('pessoa = ?', $idUsuario)
                ->where('tipo = ?', $tipo);
        if(!is_null($categoria)){
            $select->where('categoria = ?', $categoria);
        }
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
    
    public static function getCategoriaCompra($idUsuario, $tipo, $categoria = null){
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeCompra();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeCompra', array('categoria'))
                ->distinct('categoria')
                ->where('pessoa = ?', $idUsuario)
                ->where('tipo = ?', $tipo);
        if(!is_null($categoria)){
            $select->where('categoria = ?', $categoria);
        }
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
    
    public function getSegmentoVenda($idUsuario,$tipo, $categoria, $segmento = null){
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeVenda();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeVenda', array('SubCategoria'))
                ->distinct('categoria')
                ->where('pessoa = ?', $idUsuario)
                ->where('tipo = ?', $tipo)
                ->where('categoria = ?', $categoria);
        if(!is_null($segmento)){
            $select->where('SubCategoria = ?', $segmento);
        }
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
    
    public function getSegmentoCompra($idUsuario,$tipo, $categoria, $segmento = null){
        $dbPreferenciaVenda = new Admin_Model_DbTable_PreferenciasDeCompra();
        $select = $dbPreferenciaVenda->select()
                ->from('preferenciasDeCompra', array('SubCategoria'))
                ->distinct('categoria')
                ->where('pessoa = ?', $idUsuario)
                ->where('tipo = ?', $tipo)
                ->where('categoria = ?', $categoria);
        if(!is_null($segmento)){
            $select->where('SubCategoria = ?', $segmento);
        }
        $stmt = $select->query();
        return $stmt->fetchAll();
    }
    
    public static function insertPref($tipoPref, $dados){
        if(strtoupper($tipoPref) == 'COMPRA'){
            $bd = new Admin_Model_DbTable_PreferenciasCompra();
            $tabela = "preferenciasCompra";
        }elseif(strtoupper($tipoPref) == 'VENDA'){
            $bd = new Admin_Model_DbTable_PreferenciasVenda();
            $tabela = "preferenciasVenda";
        }
        try{
            $bd->insert($dados);
        } catch (Exception $ex) {
            die(var_dump($ex->getMessage()));
        }
    }
}