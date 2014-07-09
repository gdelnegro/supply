<?php

class Admin_PerfilController extends Zend_Controller_Action
{

    private $_usuario ;
    
    public function init()
    {
        /* Initialize action controller here */
        $usuario = Zend_Auth::getInstance()->getIdentity();
        $this->_usuario = $usuario;
        $modelo = new Admin_Model_Notificacoes();        
        $contagem = $modelo->count($this->_usuario->id);
        Zend_Layout::getMvcInstance()->assign('contagem', $contagem[0]['total']);
        //$this->view->usuario = $usuario;
        Zend_Layout::getMvcInstance()->assign('usuario', $usuario);
        
        if ( !Zend_Auth::getInstance()->hasIdentity() ) {
                return $this->_helper->redirector->goToRoute( array('module'=>'admin','controller' => 'login'), null, true);
        }
    }

    public function indexAction()
    {
        $relacionamento = new Admin_Model_Relacionamentos();
        $contagem = $relacionamento->contagemRelacionamentos($this->_usuario->id);
        $this->view->dadosCompras = Admin_Model_Preferencias::compra($this->_usuario->id);
        $this->view->dadosVendas = Admin_Model_Preferencias::venda($this->_usuario->id);
        $this->view->contagem = $contagem;
        
        $anuncios = new Admin_Model_Anuncio();

        $tipos = Admin_Model_Preferencias::getTipoCompra($this->_usuario->id);
        foreach($tipos as $key => $value){            
            $tiposPreferencia[] = intval($value['idTipo']);
        }
        
        $dadosAnuncios = $anuncios->getAnuncio($tiposPreferencia);
        if(count($dadosAnuncios)<2){
            $dadosAnuncios = $anuncios->getAnuncio(null);
        }
        $this->view->dadosAnuncios = $dadosAnuncios;
    }


}

