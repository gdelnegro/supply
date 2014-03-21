<?php

class Admin_Form_Endereco extends Twitter_Form
{

    public function init()
    {
        $this->setMethod('post');
        $this->setAttrib('class','form-horizontal');
        $this->setAttrib('role','form');
        
        $idEndereco = new Zend_Form_Element_Hidden('idEndereco');

        $apelido = new Zend_Form_Element_Text('apelido');
        $apelido->removeDecorator('HtmlTag')
                ->setLabel('Apelido')
                ->setAttrib('placeholder', 'Apelido');
        
        $CEP = new Zend_Form_Element_Text('CEP');
        $CEP->removeDecorator('HtmlTag')
                ->setRequired(true)
                ->setLabel('CEP')
                ->setAttrib('placeholder', 'CEP')
                ->setValidators(array(
                            array('Digits', false, array(
                                'messages' => array(
                                    'notDigits' => "Deve conter apenas numeros",
                                    'digitsStringEmpty' => 'Campo "CEP" nao pode ser nulo',
                            ))),
                        ));
        
        $logradouro = new Zend_Form_Element_Text('logradouro');
        $logradouro->removeDecorator('HtmlTag')
                ->setRequired(true)
                ->setLabel('Logradouro')
                ->setAttrib('placeholder', 'Logradouro')
                ->setValidators(array(
                        array('notEmpty', true, array(
                                'messages' => array(
                                    'isEmpty' => 'Campo "Logradouro" nao pode ser nulo'
                                )
                        ))));
        
        $complemento = new Zend_Form_Element_Text('complemento');
        $complemento->removeDecorator('HtmlTag')
                ->setLabel('Complemento')
                ->setAttrib('placeholder', 'Complemento');
        
        $numero = new Zend_Form_Element_Text('numero');
        $numero->removeDecorator('HtmlTag')
                ->setRequired(true)
                ->setLabel('Numero')
                ->setAttrib('placeholder', 'Numero')
                ->setValidators(array(
                            array('Digits', false, array(
                                'messages' => array(
                                    'notDigits' => "Deve conter apenas numeros",
                                    'digitsStringEmpty' => 'Campo "número" nao pode ser nulo',
                            )))
                        ));
        
        $cidade = new Zend_Form_Element_Text('cidade');
        $cidade->removeDecorator('HtmlTag')
                ->setRequired(true)
                ->setLabel('Cidade')
                ->setAttrib('placeholder', 'Cidade')
                ->setValidators(array(
                        array('notEmpty', true, array(
                                'messages' => array(
                                    'isEmpty' => 'Campo "cidade" nao pode ser nulo'
                                )
                        ))));
        
        $estado = new Zend_Form_Element_Text('estado');
        $estado->removeDecorator('HtmlTag')
                ->setRequired(true)
                ->setLabel('Estado')
                ->setAttrib('placeholder', 'Estado')
                ->setValidators(array(
                        array('notEmpty', true, array(
                                'messages' => array(
                                    'isEmpty' => 'Campo "estado" nao pode ser nulo'
                                )
                        ))));
        
        $pais = new Zend_Form_Element_Text('pais');
        $pais->removeDecorator('HtmlTag')
                ->setRequired(true)
                ->setLabel('País')
                ->setAttrib('placeholder', 'País')
                ->setValidators(array(
                        array('notEmpty', true, array(
                                'messages' => array(
                                    'isEmpty' => 'Campo "País" nao pode ser nulo'
                                )
                        ))));
        
        $bairro = new Zend_Form_Element_Text('bairro');
        $bairro->removeDecorator('HtmlTag')
                ->setRequired(true)
                ->setLabel('Bairro')
                ->setAttrib('placeholder', 'Bairro')
                ->setValidators(array(
                        array('notEmpty', true, array(
                                'messages' => array(
                                    'isEmpty' => 'Campo "bairro" nao pode ser nulo'
                                )
                        ))));
        
        $this->addElements(array(
            $idEndereco,
            $apelido,
            $CEP,
            $logradouro,
            $numero,
            $bairro,
            $complemento,
            $cidade,
            $estado,
            $pais,
        ));
        
        foreach($this->getElements() as $element ){
            $element->setAttrib('class', 'form-control');
        }
        
        $submit = new Zend_Form_Element_Submit('Enviar');
        $this->addElement($submit);
    }

}

