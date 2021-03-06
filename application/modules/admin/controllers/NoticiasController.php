<?php

class Admin_NoticiasController extends Zend_Controller_Action
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
        $noticias = new Admin_Model_DbTable_Noticia();
        
        $dados = $noticias->fetchAll();
        $paginator = Zend_Paginator::factory($dados);
        $paginator->setItemCountPerPage(50);
        $paginator->setPageRange(10);
        $paginator->setCurrentPageNumber($this->_request->getParam('pagina'));
        $this->view->paginator = $paginator;
        
    }
    
    public function newAction()
    {
        $form = new Admin_Form_Noticia('new',$this->_usuario->id);
        
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            //die(var_dump($data));
            
            $anuncio = new Admin_Model_DbTable_Noticia();
        
            if( $this->getRequest()->isPost() ) {
                $data = $this->getRequest()->getPost();
                unset($data['idMateria']);
                //die(var_dump($data));
                if ( $form->isValid($data) ){          
                    $titulo = urldecode( $this->_getParam('titulo') );
                    $titulo = str_replace(' ', '_',$titulo);
                    $link = urldecode( $this->_getParam('link') );
                    $bdImagem = new Admin_Model_DbTable_Midias();

                    /*Faz upload do arquivo*/
                    $upload = new Zend_File_Transfer_Adapter_Http();
                    foreach ($upload->getFileInfo() as $file => $info) {                                     
                        $extension = pathinfo($info['name'], PATHINFO_EXTENSION); 
                        $dir = APPLICATION_PATH.'/../public/images/noticias/'.$titulo.'/';
                        if (!is_dir($dir)) {
                            mkdir($dir);         
                        }
                        $upload->addFilter('Rename', array( 'target' => APPLICATION_PATH.'/../public/images/noticias/'.$titulo.'/'.$titulo.'.'.$extension,'overwrite' => true,));
                    }
                    try {
                        $upload->receive();
                    } catch (Zend_File_Transfer_Exception $e) {
                        echo $e->getMessage();
                    }

                    /*Adicionar dados no banco de dados*/

                    $dados =array(
                        'descricao'  =>   'noticia'.$this->_getParam('titulo'),
                        'titulo'      =>  $titulo.'.'.$extension,
                        'local'     =>  '/images/noticias/'.$titulo.'/',
                        'link'      =>  $link,
                        'tipo' =>  '1'
                    );
                    
                    $idImagem = $bdImagem->insert($dados);
                    
                    unset($data['link']);
                    unset($data['MAX_FILE_SIZE']);
                    unset($data['Enviar']);
                    if($data['pessoa'] == 0){
                        unset($data['pessoa']);
                    }
                    $data['midia'] = $idImagem;
                    $anuncio->insert($data);

                }else{
                    $this->view->erro='Dados Invalidos';
                    $this->view->form = $form->populate($data);
                }
            }
            
        }
        
        $this->view->form = $form;
        
        
    }
    
    public function acessoAction(){
        $this->_helper->viewRenderer->setNoRender(true);
        $bd = new Admin_Model_DbTable_Noticia();
        $data      = array('acessos' => new Zend_Db_Expr('acessos + 1')); 
        $where[] = $bd->getAdapter()->quoteInto('id = ?', $this->_getParam('id')); 
        $bd->update($data, $where); 
    }


}

