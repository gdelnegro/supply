<?php

class Admin_SegmentoController extends Zend_Controller_Action
{

    private $_usuario;
    public function init()
    {
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity()) {
            return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }elseif($this->_usuario->grupo != 1){
            return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'index'), null, true);
        }
    }

    public function indexAction()
    {
        // action body
    }
    
    public function showAction(){
        $dados = Admin_Model_Categoria::pesquisaCategoria($this->_getParam('id'));        
        $dados = Admin_Model_Segmento::pesquisaSegmento($this->_getParam('id'));
        $this->view->dados = $dados;
    }
    
    public function listasegmentosAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        echo json_encode(Admin_Model_Segmento::listaSegmento($this->_getParam('categoria'),$this->_getParam('id') ));
    }
    
    public function cadastrarAction(){
        $formSegmento = new Admin_Form_Segmento('new', $this->_usuario->grupo);
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            if ( $formSegmento->isValid($data) ){
                if($this->_usuario->grupo!=1){
                    $status = 4;
                }else{
                    $status = 1;
                }
                #die(var_dump($this->getAllParams()));
                $dtCriacao = date("Y-m-d H:i:s");
                $usrCriou = $this->_usuario->id;
                $dados = array(
                        "descricao"     =>  "{$data['descricao']}",
                        "status"        =>  "{$status}",
                        "usrCriou"      =>  "{$usrCriou}",
                        "categoria"          =>  "",
                        "dtCriacao"     =>  "{$dtCriacao}"
                    );
                #die(var_dump($data));
                foreach($data['categoria'] as $categoria){
                    $dados["categoria"] = $categoria;
                    try{
                        Admin_Model_Segmento::insert($dados);   
                    } catch (Exception $ex) {
                        die(var_dump($ex->getMessage()));
                    }
                }
                $this->redirect("/admin/segmento/index/");
            }else{                
                $this->view->erro='Dados Invalidos';
                $this->view->formSegmento = $formSegmento->populate($data);
            }
            $this->view->formSegmento = $formSegmento;
        }
        $this->view->formSegmento = $formSegmento;
    }
    
    public function testeAction(){
        $this->_helper->layout()->disableLayout();
    	$this->_helper->viewRenderer->setNoRender(true);
        
        var_dump(Admin_Model_Categoria::listaSegmentoCategoria());
    }
        


}

