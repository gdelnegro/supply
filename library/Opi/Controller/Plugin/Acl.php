<?php

class Opi_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $auth = Zend_Auth::getInstance();
        //var_dump($auth->getIdentity());
        $authModel=new Application_Model_Auth();
        
        if (!$auth->hasIdentity()){
            //If user doesn't exist it will get the Guest account from "users" table Id=1
            #$authModel->authenticate(array('login'=>'admin@opisystem.com.br','password'=>'1234'));
            #$authModel->authenticate(array('login'=>'gustavo@gustavo.com','password'=>'gustavo'));
            #if (!$authModel->authenticate(array('login'=>'Guest','password'=>'shocks'))) {
            #    $user = new Application_Model_User();
            #    $user->createUser(array('login'=>'Guest','role_id'=>'1','password'=>'shocks'));
            #}
            
            #$redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            #$redirector->gotoSimple('login');
        }
 
        $request=$this->getRequest();
        
        $aclResource=new Application_Model_AclResource();
        
        //Check if the request is valid and controller an action exists. If not redirects to an error page.
        if( !$aclResource->resourceValid($request)){
            $request->setControllerName('error');
            $request->setActionName('error');
            return;
        }
        
        #die(var_dump($auth->getIdentity()));
        
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        
        //Check if the requested resource exists in database. If not it will add it
        if( !$aclResource->resourceExists($controller, $action)){
            $aclResource->createResource($controller,$action);
        }
        
        //Get role_id
        $role_id=$auth->getIdentity()->role_id;
        #die(var_dump($role_id));
        
        $role=Application_Model_Role::getById($role_id);
        #die(var_dump($role));
        
        $role=$role[0]->role;
        #die(var_dump($role));
        
        // setup acl
        $acl = new Zend_Acl();
        
        // add the role
        $acl->addRole(new Zend_Acl_Role($role));
        
        #die(var_dump($role_id));
        
        if($role_id==3){//If role_id=3 "Admin" don't need to create the resources
            $acl->allow($role);
            $resources=$aclResource->getAllResources(); 
            
            #die('RETORNO DA FUNCAO CRIAR RECURSOS');
            // Add the existing resources to ACL
            foreach($resources as $resource){
                $acl->add(new Zend_Acl_Resource($resource->getController()));       
            }       
        }else{
            //Create all the existing resources
            $resources=$aclResource->getAllResources();  
            // Add the existing resources to ACL
            foreach($resources as $resource){
                $acl->add(new Zend_Acl_Resource($resource->getController()));       
            }       
            //Create user AllowedResources
            
            $userAllowedResources=$aclResource->getCurrentRoleAllowedResources($role_id);                
             
            // Add the user permissions to ACL
            foreach($userAllowedResources as $controllerName =>$allowedActions){
                $arrayAllowedActions=array();
                foreach($allowedActions as $allowedAction){
                    $arrayAllowedActions[]=$allowedAction;
                }
                $acl->allow($role, $controllerName,$arrayAllowedActions);
            }
        }
        
        //Check if user is allowed to acces the url and redirect if needed
        if(!$acl->isAllowed($role,$controller,$action)){
            $request->setControllerName('error');
            $request->setActionName('access-denied');
            return;
        }
        
    }
}