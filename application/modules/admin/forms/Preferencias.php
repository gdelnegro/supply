<?php

class Admin_Form_Preferencias extends Twitter_Form
{
    
    private $_tipo;
    protected $_exibir;
    protected $_usr;
    private $_cat;
    
    
    public function __construct($tipo, $usr, $cat,$options = null) {
        if(strtoupper($tipo) == 'EDIT' OR strtoupper($tipo) == 'NEW'){
            $this->_exibir = null;
        }else{
            $this->_exibir = TRUE;
        }
        if($usr == 1){
            $this->_usr = 'admin';
        }
        $this->_tipo = $tipo;
        $this->_cat = $cat;
        parent::__construct($options);
    }
    
    public function init()
    {
        $this->setMethod('post');
        $this->setAttrib('class','form-sigin');
        $this->setAttrib('role','form');
        
        $categoria = new Zend_Form_Element_Hidden('categoria');
        $tipo = new Zend_Form_Element_Hidden('tipo');
        
        $subcategoria = new Zend_Form_Element_MultiCheckbox('subcat');
        $subcategoria->setLabel('')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir)
                ->setMultiOptions(Admin_Model_Subcategoria::listaSubCategoria($this->_cat));
        
        $this->addElements(array(
            $categoria,
            $tipo,
            $subcategoria
        ));
        
        
        foreach($this->getElements() as $element ){
            $element->setAttrib('class', 'form-control');
        }
        
        if(strtoupper($this->_tipo) == 'EDIT' OR strtoupper($this->_tipo) == 'NEW'){
            $this->addElement('submit',   'Enviar',   array('ignore'    =>  true,));
        }
    }


}

