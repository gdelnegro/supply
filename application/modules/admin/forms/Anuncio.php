<?php

class Admin_Form_Anuncio extends Twitter_Form
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
        $idMateria = new Zend_Form_Element_Hidden('idMateria');
        
        $titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('Titulo do Anúncio');
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
        $link->setLabel('Link do Anúncio');
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
        
        $texto = new Zend_Form_Element_Textarea('texto');
        $texto->setLabel('Texto do Anúncio')
                ->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators( array(
                     array('notEmpty', true, array(
                         'messages' => array(
                             'isEmpty' => 'O texto não pode ser nulo'
                         )
                     ))
               ))
                ->setAttrib('disabled', $this->exibir);
        
        $arquivo = new Zend_Form_Element_File('midia');
        $arquivo->setLabel('Miniatura')
                ->setRequired('true')
                ->addValidator('Count', false, 1)
                ->addValidator('Size',false,5502400)
                ->addValidator('Extension',false,'jpg,png,gif');
        
        $pessoa = new Admin_Model_Usuario();
        $dadosPessoa = $pessoa->listUsuario();
        
        $sponsor = new Zend_Form_Element_Select('pessoa');
        $sponsor->setLabel('Patrocinador')
                ->addMultiOptions(
                        array('0'=>'Sem Patrocinador')
                )
                ->addMultiOptions($dadosPessoa);
        
        $destaque = new Zend_Form_Element_Select('destaque');
        $destaque->setLabel('É destaque?')
                ->addMultiOptions(
                        array('0'=>'Não',
                            '1'=>'Sim')
                );
        
        $ativo = new Zend_Form_Element_Select('ativo');
        $ativo->setLabel('Ativo?')
                ->addMultiOptions(
                        array('0'=>'Não',
                            '1'=>'Sim')
                );
        
         $dtValidade = new Zend_Form_Element_Text('dtValidade');
         $dtValidade->setLabel('Data de Vencimento')
                 ->setRequired('true')
                ->setFilters(array('StringTrim'))
                ->setValidators( array(
                     array('notEmpty', true, array(
                         'messages' => array(
                             'isEmpty' => 'A data não pode ser nula'
                         )
                     ))
               ))
                ->setAttrib('disabled', $this->exibir);
        $tipo = new Zend_Form_Element_Select('Tipo');
        $tipo->setLabel('Tipo')
                ->addMultiOptions(
                        array('0'=>'Selecione um tipo'))
                ->addMultiOptions(Admin_Model_Tipo::listaTipo());
        
        $categoria = new Zend_Form_Element_Select('categoria');
        $categoria->setLabel('Categoria')
                ->addMultiOptions(
                        array('0'=>'Selecione uma categoria'))
                ->addMultiOptions(Admin_Model_Categoria::listaCategoria());
         
        $segmento = new Zend_Form_Element_Select('segmento');
        $segmento->setLabel('Segmento')
                ->addMultiOptions(
                        array('0'=>'Selecione um segmento'))
                ->addMultiOptions(Admin_Model_Segmento::listaSegmento());
        #$tag;
        
        $this->addElements( array(
            $idMateria,
            $titulo,
            $link,
            $descricao,
            $texto,
            $sponsor,
            $tipo,
            $categoria,
            $segmento,
            $destaque,
            $dtValidade,
            $ativo,
            $arquivo,
        ));
        
        
        $submit = new Zend_Form_Element_Submit('Enviar');
        
        $this->addElement($submit);
    }
}