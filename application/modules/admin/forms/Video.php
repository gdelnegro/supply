<?php

class Admin_Form_Video extends Twitter_Form
{

    protected $exibir;
    protected $tipo;
    protected $usr;

    public function __construct($tipo = null, $usr = null, $options = null) {
        $this->tipo = strtoupper($tipo);
        $this->usr = $usr;
        
        if ( strtoupper($tipo)=='EDIT' OR strtoupper($tipo)=='NEW'){
            $this->exibir = null;
        }else if ( strtoupper($tipo) == 'SHOW' ){
            $this->exibir = true;
        }
        parent::__construct($options);
    }

    public function init()
    {
        
        $this->setMethod('post');
        $this->setAttrib('horizontal', true);
        $idMateria = new Zend_Form_Element_Hidden('id');
        
        $titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('Titulo do Video');
        $titulo->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators( array(
                     array('notEmpty', true, array(
                         'messages' => array(
                             'isEmpty' => 'O título não pode ser nulo'
                         )
                     ))
               ))
                ->setAttrib('disabled', $this->exibir);
        
        $link = new Zend_Form_Element_Text('link');
        $link->setLabel('Link do Video');
        $link->setRequired(false)
                ->setFilters(array('StringTrim'))
                ->setAttrib('disabled', $this->exibir);
        
        $descricao = new Zend_Form_Element_Textarea('descricao');
        $descricao->setLabel('Resumo')
                ->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators( array(
                     array('notEmpty', true, array(
                         'messages' => array(
                             'isEmpty' => 'A descrição não pode ser nula'
                         )
                     ))
               ))
                ->setAttrib('disabled', $this->exibir);
        #$tag;
        
        $this->addElements( array(
            $idMateria,
            $titulo,
            $link,
            $descricao,            
        ));
        
        
        $submit = new Zend_Form_Element_Submit('Enviar');
        
        $this->addElement($submit);
    }


}

