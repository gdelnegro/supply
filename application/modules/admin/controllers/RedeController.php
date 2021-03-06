<?php

class Admin_RedeController extends Zend_Controller_Action
{

    private $_usuario ;
    
    public function init()
    {
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        $modelo = new Admin_Model_Notificacoes();        
        $contagem = $modelo->count($this->_usuario->id);
        Zend_Layout::getMvcInstance()->assign('contagem', $contagem[0]['total']);
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }

    public function indexAction()
    {
        $relacionamento = new Admin_Model_Relacionamentos();
        /*
         * gerar array com dados dos contatos fornecedores
         * gerar array com dados dos contatos clientes
         */
        $dadosTipoRelacionamento = $relacionamento->listaTipoRelacionamento();
        $this->view->tipoRelacionamento = $dadosTipoRelacionamento;
        $this->view->nomeUsuario = $this->_usuario->nome;
        $relacionamentosFornecedores = array();
        $relacionamentosClientes = array();
        $dadosRelacionamento = $relacionamento->buscaRelacionamento($this->_usuario->id,1);
        foreach($dadosRelacionamento as $indice=>$dados){
            if($dados['Solicitante'] == $this->_usuario->nome){
                if($dados['TipoOrigem']=='Fornecedor'){
                    $relacionamentosFornecedores[]=$dados;
                }elseif($dados['TipoOrigem']=='Cliente'){
                    $relacionamentosClientes[]=$dados;
                }
            }elseif($dados['Solicitado'] == $this->_usuario->nome){
                if($dados['tipoDestino']=='Fornecedor'){
                    $relacionamentosFornecedores[]=$dados;
                }elseif($dados['tipoDestino']=='Cliente'){
                    $relacionamentosClientes[]=$dados;
                }
            }
        }        
        $this->view->relacionamentosClientes = $relacionamentosClientes;
        $this->view->relacionamentosFornecedores = $relacionamentosFornecedores;
        if($this->getRequest()->getMethod() == 'POST'){
            $nomeUsuario = $this->_getParam('nome');
                if($nomeUsuario!=''){
                    
                    $resultadoBusca = $relacionamento->pesquisaUsuario($nomeUsuario,$this->_usuario->id);
                    if($resultadoBusca){
                        $this->view->dados = $resultadoBusca;
                    }
                }
        }
        
        //DADOS ANUNCIOS
        $anuncios = new Admin_Model_Anuncio();

        $tipos = Admin_Model_Preferencias::getTipoCompra($this->_usuario->id);
        foreach($tipos as $key => $value){            
            $tiposPreferencia[] = intval($value['idTipo']);
        }        
        
        $categorias = Admin_Model_Preferencias::getCategoriaCompra($this->_usuario->id);
        foreach($categorias as $key => $value){            
            $categoriasPreferencia[] = intval($value['idCategoria']);
        }
        
        $modeloSegmento = new Admin_Model_Preferencias();
        $segmentos = $modeloSegmento->getSegmentoCompra($this->_usuario->id);
        foreach($segmentos as $key => $value){            
            $segmentosPreferencia[] = intval($value['idTipo']);
        }
        
        $dadosAnuncios = $anuncios->getAnuncio($tiposPreferencia, $categoriasPreferencia, $segmentosPreferencia,6);
        if(count($dadosAnuncios)<2){
            $dadosAnuncios = $anuncios->getAnuncio(null, null, null,6);
        }
        $this->view->dadosAnuncios = $dadosAnuncios;
        //DADOS ANUNCIOS
        
    }
    
    public function adicionarAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        $idUsuario = $this->_getParam('id');
        $idSolicitante = $this->_usuario->id;
        $tipoRelacionamento = $this->_getParam('tipoRelacionamento');
        if($idSolicitante != $idUsuario){
            $relacionamento = new Admin_Model_Relacionamentos();
            $mensagem = $relacionamento->adicionar($idSolicitante, $idUsuario,$tipoRelacionamento);
            if(!is_null($mensagem)){
                echo "<script>alert('$mensagem')</script>";
            }
            $this->redirect("/admin/rede");
        }
    }
    
    public function removerAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        $idRelacionamento = $this->_getParam('id');
        $relacionamento = new Admin_Model_Relacionamentos();
        try{
            $relacionamento->removeRelacionamento($this->_usuario->id, $idRelacionamento);
        } catch (Exception $ex) {
            die();
        }
        
        $this->redirect("/admin/rede");
    }
    
    public function exibirAction(){
        /**
         * mostra todos os relacionamentos pendentes
         */
        $idUsuario = $this->_usuario->id;
        $relacionamento = new Admin_Model_Relacionamentos();
        $dadosRelacionamentos = $relacionamento->buscaRelacionamento($idUsuario, 2);
        
        $this->view->dadosRelacionamentos = $dadosRelacionamentos;
        
    }
    
    public function aprovarAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        
        $idRelacionamento = $this->_getParam('id');
        $db = new Admin_Model_DbTable_Relacionamentos();
        $data = array(
            'status' => 1
        );
        $where = array(
                'idRelacionamento = ?' => $idRelacionamento
        );
        try{
            $db->update($data, $where);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
        
        $this->redirect("/admin/rede/exibir");
    }
    
    public function rejeitarAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        
        $idRelacionamento = $this->_getParam('id');
        $db = new Admin_Model_DbTable_Relacionamentos();
        $data = array(
            'status' => 3
        );
        $where = array(
                'idRelacionamento = ?' => $idRelacionamento
        );
        $db->update($data, $where);
        
        $this->redirect("/admin/rede/exibir");
    }


}

