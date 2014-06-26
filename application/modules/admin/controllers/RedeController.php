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
        $relacionamentosFornecedores = array();
        $relacionamentosClientes = array();
        $dadosRelacionamento = $relacionamento->buscaRelacionamento($this->_usuario->id);
        foreach($dadosRelacionamento as $indice=>$dados){
            if($dados['tipoRelacionamento']=='Fornecedor'){
                $relacionamentosFornecedores[]=$dados;
            }elseif($dados['tipoRelacionamento']=='Cliente'){
                $relacionamentosClientes[]=$dados;
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
        
    }
    
    public function adicionarAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        $idUsuario = $this->_getParam('id');
        $idSolicitante = $this->_usuario->id;
        if($idSolicitante != $idUsuario){
            $relacionamento = new Admin_Model_Relacionamentos();
            $mensagem = $relacionamento->adicionar($idSolicitante, $idUsuario,1);
            if(!is_null($mensagem)){
                echo "<script>alert('$mensagem')</script>";
            }
            $this->redirect("/admin/rede");
        }
    }


}

