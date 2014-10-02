<?php

class Admin_Form_Pessoa extends Twitter_Form
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
        //$this->setAttrib('class','form-sigin');
        //$this->setAttrib('role','form');
        
        /* Form Elements & Other Definitions Here ... */
        $id = new Zend_Form_Element_Hidden('id');
        
        $nome = new Zend_Form_Element_Text('nome');
        $nome->setLabel('Nome')                
                ->setAttrib('placeholder','Nome')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);
        
        $emailContato = new Zend_Form_Element_Text('emailContato');
        $emailContato->setLabel('Email de Contato')
                ->setAttrib('placeholder','Email de contato')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);
        
        $telefonePrincipal = new Zend_Form_Element_Text('telefonePrincipal');
        $telefonePrincipal->setLabel('Telefone Principal')
                ->setAttrib('placeholder','Telefone de Contato')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);
        
        $senha = new Zend_Form_Element_Password('senha');
        $senha->setLabel('Senha')
                ->setAttrib('placeholder','Senha')
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);
        
        $tipoPessoa = new Zend_Form_Element_Select('tipoPessoa');
        $tipoPessoa->setLabel('Tipo de Pessoa')
                ->addMultiOptions(array(
                    '0'=>'Selecione Tipo de Pessoa',
                    '1'=>'Física',
                    '2'=>'Jurídica'
                ))
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);
        
        $grupo = new Zend_Form_Element_Select('grupo');
        $grupo->setLabel('Grupo')
                ->addMultiOptions(array(
                    '0'=>'Selecione',
                    '1'=>'Administrador Sistema',
                    '2'=>'Jurídica'
                ))
                ->removeDecorator('HtmlTag')
                ->setAttrib('disabled', $this->_exibir);
        
        
        $this->addElements(array(
            $id,
            $nome,
            $emailContato,
            $telefonePrincipal,
            $senha,
        ));
        
        if($this->_usr == 'admin'){
            $this->addElements(array(
                $tipoPessoa,
                $grupo
            ));
        }
        
        foreach($this->getElements() as $element ){
            $element->setAttrib('class', 'form-control');
        }
        
        if($this->_tipo == 'edit' OR $this->_tipo == 'new'){
            $submit = new Zend_Form_Element_Submit('Enviar');
            $this->addElement('submit',   'Enviar',   array('ignore'    =>  true,));
        }
        
    }
}

