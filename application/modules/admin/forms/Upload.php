<?php

class Admin_Form_Upload extends Twitter_Form
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
        $this->setEnctype( Zend_form::ENCTYPE_MULTIPART );
        $produto = new Zend_Form_Element_Hidden('id');
        $orcamento = new Zend_Form_Element_Hidden('orcamento');
        
        $arquivo = new Zend_Form_Element_File('arquivo');
        $arquivo->setLabel('Logotipo')
                ->setRequired('true')
                ->addValidator('Count', false, 1)
                ->addValidator('Size',false,5502400);
        
        $descricao = new Zend_Form_Element_Textarea('descricao');
        $descricao->setLabel('Descrição do arquivo')
                ->setRequired('true')
                ->setValidators( array(
                     array('notEmpty', true, array(
                         'messages' => array(
                             'isEmpty' => 'A descrição não pode ser nula'
                         )
                     ))
               ));
        
        $nome = new Zend_Form_Element_Text('nome');
        $nome->setLabel('Título do arquivo')
                ->setRequired('true')
                ->setValidators( array(
                     array('notEmpty', true, array(
                         'messages' => array(
                             'isEmpty' => 'O nome não pode ser nulo'
                         )
                     ))
               ));
        
        
        $enviar = new Zend_Form_Element_Submit('enviar');
        $enviar->setLabel('Enviar');
        
        $this->addElements(array(
            $produto,
            $orcamento,
            $nome,
            $descricao,
            $arquivo,
            $enviar
        ));
    }


}

