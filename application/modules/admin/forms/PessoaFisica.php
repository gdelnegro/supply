<?php

class Admin_Form_PessoaFisica extends Twitter_Form
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
        $this->setAttrib('class','form-horizontal');
        $this->setAttrib('role','form');
        
        /* Form Elements & Other Definitions Here ... */
        $idPessoa = new Zend_Form_Element_Hidden('idPessoa');
        
        $nomeMae = new Zend_Form_Element_Text('nomeMae');
        $nomeMae->setLabel('Nome da mãe')
                ->setAttrib('placeholder','Nome da Mãe')
                ->removeDecorator('HtmlTag');
        
        $CPF = new Zend_Form_Element_Text('CPF');
        $CPF->setAttrib('class', 'form-control')
                ->setLabel('CPF')
                ->setAttrib('placeholder','CPF')
                ->removeDecorator('HtmlTag');
        
        $RG = new Zend_Form_Element_Text('RG');
        $RG->setLabel('RG')
                ->setAttrib('placeholder','RG')
                ->removeDecorator('HtmlTag');
        
        $dtNascimento = new Zend_Form_Element_Text('dtNascimento');
        $dtNascimento->setLabel('Data de Nascimento')
                ->setAttrib('placeholder','Data de Nascimento')
                ->removeDecorator('HtmlTag');
        
        $this->addElements(array(
            $idPessoa,
            $nomeMae,
            $CPF,
            $RG,
            $dtNascimento
        ));
        
        foreach($this->getElements() as $element ){
            $element->setAttrib('class', 'form-control')
                ->setAttrib('disabled', $this->_exibir);
        }
        
        if($this->_tipo == 'edit' OR $this->_tipo == 'new'){
            $this->addElement('submit',   'Enviar',   array('ignore'    =>  true,));
        }        
    }


}

