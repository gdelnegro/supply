<?php

class Admin_AnuncioController extends Zend_Controller_Action
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
        $bdArtigos = new Application_Model_DbTable_Artigo();
        $artigos = $bdArtigos->pesquisarArtigo();
        
        $paginator = Zend_Paginator::factory($artigos);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
    }
    
    public function newAction()
    {
        $titulo = urldecode( $this->_getParam('titulo') );
        $titulo = str_replace(' ', '_',$titulo);
        
        $bdImagem = new Application_Model_DbTable_Imagens();
        $dbArtigos = new Application_Model_DbTable_Artigo();
        
        $formMateria = new Admin_Form_Materia();
        
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            
            if ( $formMateria->isValid($data) ){                
                $dbImagens = new Application_Model_DbTable_Imagens();
        
                /*Faz upload do arquivo*/
                $upload = new Zend_File_Transfer_Adapter_Http();
                foreach ($upload->getFileInfo() as $file => $info) {                                     
                    $extension = pathinfo($info['name'], PATHINFO_EXTENSION); 
                    $upload->addFilter('Rename', array( 'target' => APPLICATION_PATH.'/../public/images/materia-'.$titulo.'.'.$extension,'overwrite' => true,));
                }
            try {
                $upload->receive();
                } catch (Zend_File_Transfer_Exception $e) {
                    echo $e->getMessage();
                }
        
                /*Adicionar dados no banco de dados*/
        
                $dados =array(
                    'descricao'  =>   'Logotipo'.$this->_getParam('sponsor'),
                    'nome'      =>  'materia-'.$titulo.'.'.$extension,
                    'local'     =>  '../public/images/',
                );
        
                $idImagem = $bdImagem->incluirImagem($dados);        
                       
                $dbArtigos->incluirArtigo($data, $idImagem);
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'article'), null, true);
                #$this->view->dados = $dadosMateria;
                
            }else{
                $this->view->erro='Dados Invalidos';
                $this->view->formMateria = $formMateria->populate($data);
            }
        }
        $this->view->formMateria = $formMateria;
    }


}

