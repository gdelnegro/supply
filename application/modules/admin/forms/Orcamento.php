<?php

class Admin_Form_Orcamento extends Twitter_Form
{
   
    private $_tipo;
    protected $_editavel;
    protected $_usr;
    
    
    public function __construct($tipo, $usr,$options = null) {
        if(strtoupper($tipo) == 'EDIT' OR strtoupper($tipo) == 'NEW'){
            $this->_editavel = true;
        }else{
            $this->_editavel = false;
        }
        if($usr == 1){
            $this->_usr = 'admin';
        }
        $this->_tipo = $tipo;
        parent::__construct($options);
    }
    
    public function init()
    {
        $this->setMethod('post');
        $this->setAttrib('class','form-sigin');
        $this->setAttrib('role','form');
        
        /* Form Elements & Other Definitions Here ... */
        $id = new Zend_Form_Element_Hidden('id');
        
        $comprador = new Zend_Form_Element_Text('comprador');
        $comprador->setLabel('Comprador')                
                ->setAttrib('placeholder','Comprador')
                ->removeDecorator('HtmlTag');
        
        $this->addElements(array(
            $id,
            $comprador,
        ));
        
        
        foreach($this->getElements() as $element ){
            $element->setAttrib('class', 'form-control');
        }
        
        if(strtoupper($this->_tipo) == 'EDIT' OR strtoupper($this->_tipo) == 'NEW'){
            $this->addElement('submit',   'Enviar',   array('ignore'    =>  true,));
        }
        
    }
}