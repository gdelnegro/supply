<?php

class Admin_Form_Segmento extends Twitter_Form
{
    
    private $_tipo;
    protected $_exibir;
    protected $_usr;
    
    
    public function __construct($tipo, $usr,$options = null) {
        if(strtoupper($tipo) == 'EDIT' OR strtoupper($tipo) == 'NEW'){
            $this->_exibir = null;
        }else{
            $this->_exibir = TRUE;
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
        
        $id = new Zend_Form_Element_Hidden('id');
        
        $descricao = new Zend_Form_Element_Text('descricao');
        $descricao->setLabel('Nome do Segmento')                
                ->setAttrib('placeholder','Descricao')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);
        
        $categoria = new Zend_Form_Element_MultiCheckbox('categoria');
        $categoria->setLabel('Categoria do segmento')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir)
                ->setMultiOptions(Admin_Model_Categoria::listaSegmentoCategoria());
        
        $this->addElements(array(
            $id,
            $descricao,
            $categoria,
        ));
        
        
        foreach($this->getElements() as $element ){
            $element->setAttrib('class', 'form-control');
        }
        
        if(strtoupper($this->_tipo) == 'EDIT' OR strtoupper($this->_tipo) == 'NEW'){
            $this->addElement('submit',   'Enviar',   array('ignore'    =>  true,));
        }
    }


}

