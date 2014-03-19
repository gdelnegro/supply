<?php

class Admin_Bootstrap extends Zend_Application_Module_Bootstrap
{
    public function _initAutoload(){
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Opi_');
        return $autoloader;
    }
}