<?php

class Admin_Form_PessoaJuridica extends Zend_Form
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
        
        /* Form Elements & Other Definitions Here ... */
        $idPessoa = new Zend_Form_Element_Hidden('idPessoa');
        
        $CNPJ = new Zend_Form_Element_Text('CNPJ');
        $CNPJ->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','CNPJ')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);        
        
        $dtFundacao = new Zend_Form_Element_Text('dtFundacao');
        $dtFundacao->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','Data de Fundação')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);
        
        $logo = new Zend_Form_Element_File('logo');
        $logo->setAttrib('class', 'form-control')
                ->setAttrib('placeholder', 'Logotipo')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);
        
        $this->addElements(array(
            $idPessoa,
            $CNPJ,
            $dtFundacao,
            $logo
        ));
        
        $this->addElement(
                'submit',   'Enviar',   array()
                );
    }


}

