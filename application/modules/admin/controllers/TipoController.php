<?php

class Admin_TipoController extends Zend_Controller_Action
{
    private $_usuario;
    
    public function init()
    {
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        $modelo = new Admin_Model_Notificacoes();        
        $contagem = $modelo->count($this->_usuario->id);
        Zend_Layout::getMvcInstance()->assign('contagem', $contagem[0]['total']);
        
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }

    public function indexAction()
    {
        $modelo = new Admin_Model_Tipo();
        $dados = $modelo->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
    }
    
    public function listanomeAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        echo json_encode(Admin_Model_Tipo::getId($this->_getParam('nome')));
    }
    
    public function cadastrarAction(){
        $formTipo = new Admin_Form_Tipo('new',$this->_usuario->grupo);
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            if ( $formTipo->isValid($data) ){
                if($this->_usuario->grupo!=1){
                    $status = 4;
                }else{
                    $status = 1;
                }
                $dtCriacao = date("Y-m-d H:i:s");
                $usrCriou = $this->_usuario->id;
                $dados = array(
                    "descricao"     =>  "{$data['descricao']}",
                    "status"        =>  "$status",
                    "usrCriou"      =>  "{$this->_usuario->id}",
                    "dtCriacao"     =>  "$dtCriacao"
                );
                Admin_Model_Tipo::addTipo($dados);
                $this->redirect("/admin/tipo/cadastrar/");
            }else{                
                $this->view->erro='Dados Invalidos';
                $this->view->formTipo = $formTipo->populate($data);
            }
            $this->view->formTipo = $formTipo;
        }
        $this->view->formTipo = $formTipo;
    }
    
    public function listatiposAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        echo json_encode(Admin_Model_Tipo::listaTipo($this->_getParam('id')));
    }
    
    public function deletarAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        
        $db = new Admin_Model_DbTable_Tipos();
        $data = array('status'=>'2');
        $where = $db->getAdapter()->quoteInto("id = ?", intval($this->_getParam('id')));
        try{
            $db->update($data, $where);
        } catch (Exception $ex) {
            
        }
        
        $this->redirect("/admin/tipo/");
    }


}

