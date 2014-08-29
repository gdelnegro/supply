<?php

class Admin_VideosController extends Zend_Controller_Action
{

    private $_usuario ;
    
    public function init()
    {
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        //$this->view->usuario = $usuario;
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
        $videos = new Admin_Model_Midias();   
        
        $dados = $videos->pesquisaMidias(null, 2);
        $paginator = Zend_Paginator::factory($dados);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
        
    }
    
    public function newAction()
    {
        $form = new Admin_Form_Video('new',$this->_usuario->id);
        
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            //die(var_dump($data));
            
            if( $this->getRequest()->isPost() ) {
                $data = $this->getRequest()->getPost();
                unset($data['id']);
                //die(var_dump($data));
                if ( $form->isValid($data) ){          
                    $titulo = urldecode( $this->_getParam('titulo') );
                    $titulo = str_replace(' ', '_',$titulo);
                    $link = urldecode( $this->_getParam('link') );
                    $bdVideo = new Admin_Model_DbTable_Midias();                    

                    /*Adicionar dados no banco de dados*/

                    $dados =array(
                        'descricao'  =>   $data['descricao'],
                        'titulo'      =>  $titulo,
                        'local'     =>  '',
                        'link'      =>  $link,
                        'tipo' =>  '2'
                    );
                    
                    $bdVideo->insert($dados);
                }else{
                    $this->view->erro='Dados Invalidos';
                    $this->view->form = $form->populate($data);
                }
            }
            
        }
        
        $this->view->form = $form;
        
        
    }


}

