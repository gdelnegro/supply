<?php

class Admin_CategoriaController extends Zend_Controller_Action
{

    private $_usuario;
    public function init()
    {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        //$this->view->usuario = $usuario;
        $modelo = new Admin_Model_Notificacoes();        
        $contagem = $modelo->count($this->_usuario->id);
        Zend_Layout::getMvcInstance()->assign('contagem', $contagem[0]['total']);
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity()) {
            return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }#elseif($this->_usuario->grupo != 1){
         #   return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'index'), null, true);
        #}
    }

    public function indexAction()
    {
        $dados = Admin_Model_Categoria::pesquisaCategoria();
        $paginator = Zend_Paginator::factory($dados);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
    }
    
    public function cadastrarAction(){
        $formCategoria = new Admin_Form_Categoria('new', $this->_usuario->grupo);
        if( $this->getRequest()->isPost() ) {
            $dtCriacao = date("y-m-d h:i:s");
            $data = $this->getRequest()->getPost();
            if ( $formCategoria->isValid($data) ){
                if($this->_usuario->grupo!=1){
                    $status = 4;
                }else{
                    $status = 1;
                }
                $dados = array(
                        "descricao"     =>  "{$data['descricao']}",
                        "status"        =>  "{$status}",
                        "usrCriou"      =>  "{$this->_usuario->id}",
                        "tipo"          =>  "",
                        "dtCriacao"     =>  "{$dtCriacao}"
                    );
                $dtCriacao = date("Y-m-d H:i:s");
                $usrCriou = $this->_usuario->id;
                #die(var_dump($data));
                foreach($data['Tipo'] as $tipo){
                    $dados["tipo"] = $tipo;
                    Admin_Model_Categoria::insereCategoria($dados);    
                }
                $this->redirect("/admin/categoria/cadastrar/");
            }else{                
                $this->view->erro='Dados Invalidos';
                $this->view->formCategoria = $formCategoria->populate($data);
            }
            $this->view->formCategoria = $formCategoria;
        }
        $this->view->formCategoria = $formCategoria;
    }
    
    public function showAction(){
        $dados = Admin_Model_Categoria::pesquisaCategoria($this->_getParam('id'));        
        $this->view->dados = $dados;
    }
    
    public function pesquisarcategoriaAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        echo json_encode(Admin_Model_Categoria::pesquisaCategoria($this->_getParam('categoria'), $this->_getParam('tipo')));
    }
    
    public function deletarAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        $db = new Admin_Model_DbTable_Categoria();
        $data = array('status'=>'2');
        $where = $db->getAdapter()->quoteInto("id = ?", intval($this->_getParam('id')));
        try{
            $db->update($data, $where);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        
        $this->redirect("/admin/categoria/");
    }


}

