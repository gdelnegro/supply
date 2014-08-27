<?php

class Admin_Form_Eventos extends Twitter_Form
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
        $idEvento = new Zend_Form_Element_Hidden('id_evento');
        
        $titulo = new Zend_Form_Element_Text('titulo');
        $titulo->setLabel('Titulo do evento');
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
        
        $descricao = new Zend_Form_Element_Textarea('descricao');
        $descricao->setLabel('Descrição do evento')
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
        
        $data_inicio = new Zend_Form_Element_Text('data_inicio');
        $data_inicio->setLabel('Data de início')
                ->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators(array(
                    array(
                        'notEmpty', true, array(
                            'messages' => array(
                                'isEmpty'   =>  'A data de início não pode ser nula'
                            )
                        )
                    )
                ))
                ->setAttrib('disabled', $this->exibir);
        
        $data_fim = new Zend_Form_Element_Text('data_fim');
        $data_fim->setLabel('Data de término')
                ->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators(array(
                    array(
                        'notEmpty', true, array(
                            'messages' => array(
                                'isEmpty'   =>  'A data de término não pode ser nula'
                            )
                        )
                    )
                ))
                ->setAttrib('disabled', $this->exibir);
        
        $prazo_inscricao = new Zend_Form_Element_Text('prazo_inscricao');
        $prazo_inscricao->setLabel('Data de término das inscrições')
                ->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators(array(
                    array(
                        'notEmpty', true, array(
                            'messages' => array(
                                'isEmpty'   =>  'A data não pode ser nula'
                            )
                        )
                    )
                ))
                ->setAttrib('disabled', $this->exibir);
        
        $inscricao = new Zend_Form_Element_Text('inscricao');
        $inscricao->setLabel('Valor inscrição')
                ->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators(array(
                    array(
                        'notEmpty', true, array(
                            'messages' => array(
                                'isEmpty'   =>  'O valor não pode ser vazio'
                            )
                        )
                    )
                ))
                ->setAttrib('disabled', $this->exibir);
        
        $local = new Zend_Form_Element_Text('Local');
        $local->setLabel('Local')
                ->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators(array(
                    array(
                        'notEmpty', true, array(
                            'messages' => array(
                                'isEmpty'   =>  'O local não pode ser vazio'
                            )
                        )
                    )
                ))
                ->setAttrib('disabled', $this->exibir);
        
        $site = new Zend_Form_Element_Text('url');
        $site->setLabel('Site')
                ->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators(array(
                    array(
                        'notEmpty', true, array(
                            'messages' => array(
                                'isEmpty'   =>  'O site não pode ser vazio'
                            )
                        )
                    )
                ))
                ->setAttrib('disabled', $this->exibir);
        
        $arquivo = new Zend_Form_Element_File('midia');
        $arquivo->setLabel('Miniatura')
                ->setRequired('true')
                ->addValidator('Count', false, 1)
                ->addValidator('Size',false,5502400)
                ->addValidator('Extension',false,'jpg,png,gif');
        
        $ministrante = new Zend_Form_Element_Text('ministrante');
        $ministrante->setLabel('Ministrante')
                ->setRequired(true)
                ->setFilters(array('StringTrim'))
                ->setValidators(array(
                    array(
                        'notEmpty', true, array(
                            'messages' => array(
                                'isEmpty'   =>  'O ministrante não pode ser vazio'
                            )
                        )
                    )
                ))
                ->setAttrib('disabled', $this->exibir);
        
        $this->addElements( array(
            $idEvento,
            $titulo,
            $descricao,
            $ministrante,
            $data_inicio,
            $data_fim,
            $prazo_inscricao,
            $inscricao,
            $local,
            $site
        ));
        
        
        $submit = new Zend_Form_Element_Submit('Enviar');
        
        $this->addElement($submit);
    }


}

