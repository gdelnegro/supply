<?php

class Admin_LoginController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        $this->_helper->layout()->disableLayout();
        
        $loginForm = new Admin_Form_Login();
        
        if( $this->getRequest()->isPost() ) {
            $data = $this->getRequest()->getPost();
            
            if ( $loginForm->isValid($data) ){
                $login = $loginForm->getValue('email');
                $pass  = $loginForm->getValue('senha');
                
                $dbAdapter = Zend_Db_Table::getDefaultAdapter();
                
                $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
                $authAdapter->setTableName('pessoa')
                        ->setIdentityColumn('emailContato')
                        ->setCredentialColumn('senha')
                        ->setCredentialTreatment('MD5(?)');
                
                $authAdapter->setIdentity($login)->setCredential($pass);
                
                $auth = Zend_Auth::getInstance();
                
                $result = $auth->authenticate($authAdapter);
                
                if( $result->isValid() ) {
                    $user = $authAdapter->getResultRowObject();
                    $auth->getStorage()->write($user);
                    #if($status == 4){
                    #    $this->_redirect($url);
                    #}
                    $this->_redirect('admin/');
                }
                else{
                    $this->view->erro='Dados Invalidos';
                    $this->view->loginForm = $loginForm->populate($data);
                }
            }else{                
                $this->view->erro='Dados Invalidos';
                $this->view->loginForm = $loginForm->populate($data);
            }
        }
        $this->view->loginForm = $loginForm;
    }
}
