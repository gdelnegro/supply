<?php

class Admin_Form_Proposta extends Twitter_Form
{
    
    private $_tipo;
    protected $_exibir;
    protected $_usr;
    private $_orcamento;
    
    
    public function __construct($tipo, $usr, $orcamento,$options = null) {
        if(strtoupper($tipo) == 'EDIT' OR strtoupper($tipo) == 'NEW'){
            $this->_exibir = null;
        }else{
            $this->_exibir = TRUE;
        }
        if($usr == 1){
            $this->_usr = 'admin';
        }
        $this->_tipo = $tipo;
        $this->_orcamento = $orcamento;
        parent::__construct($options);
    }
    
    public function init()
    {
        $this->setMethod('post');
        $this->setAttrib('class','form-sigin');
        $this->setAttrib('role','form');
        
        $orcamento = new Zend_Form_Element_Hidden('orcamento');
        
        $descricao = new Zend_Form_Element_Text('Descricao');
        $descricao->setRequired(true)
                ->setAttrib('placeholder','Descricao da proposta')
                ->setAttrib('class', 'form-control')
                ->setAttrib('autofocus', 'autofocus')
                ->setValidators(array(
                        array('notEmpty', true, array(
                                'messages' => array(
                                    'isEmpty' => 'Campo "descricao" nao pode ser nulo'
                                )
                        ))));
        
        $valor = New Zend_Form_Element_Text('Valor');
        $valor->setRequired(true)
                ->setAttrib('placeholder','Valor da proposta')
                ->setAttrib('class', 'form-control')
                ->setAttrib('autofocus', 'autofocus')
                ->setValidators(array(
                        array('notEmpty', true, array(
                                'messages' => array(
                                    'isEmpty' => 'Campo "valor" nao pode ser nulo'
                                )
                        ))));
        
        $this->addElements(array(
            $orcamento,
            $descricao,
            $valor
        ));
        
        
        foreach($this->getElements() as $element ){
            $element->setAttrib('class', 'form-control');
        }
        
        if(strtoupper($this->_tipo) == 'EDIT' OR strtoupper($this->_tipo) == 'NEW'){
            $this->addElement('submit',   'Enviar',   array('ignore'    =>  true,));
        }
    }


}

