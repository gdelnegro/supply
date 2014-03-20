<?php

class Admin_Form_Login extends Twitter_Form
{

    public function init()
    {
       /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
        
        $this->setAttrib('class','form-sigin');
        $this->setAttrib('role','form');
        
        $login = new Zend_Form_Element_Text("email");
        $login->setRequired(true)
                ->setAttrib('placeholder','Email')
                ->setAttrib('class', 'form-control')
                ->setAttrib('autofocus', 'autofocus')
                ->setValidators(array(
                        array('notEmpty', true, array(
                                'messages' => array(
                                    'isEmpty' => 'Campo "email" nao pode ser nulo'
                                )
                        ))));
                
        $senha = new Zend_Form_Element_Password('senha',array(
                    'placeholder'=>'Senha',
                    'value' => '',
                    'class' => 'form-control',
                    'required' => true,
                    'tabindex' => '13',
                    'validators' => array(
                        /*array('Digits', false, array(
                                'messages' => array(
                                    'notDigits' => "Senha com simbolo invalido",
                                    'digitsStringEmpty' => "",
                            ))),*/
                        array('notEmpty', true, array(
                                'messages' => array(
                                    'isEmpty' => 'Senha nao pode ser nula'
                                )
                        )),

                    ),
                    'filters' => array('StringTrim'),
                    //'decorators' => $this->requiredElementDecorators,
                    //'description' => '<img src="' . $baseurl . '/images/star.png" alt="required" />',
                ));
        $senha->removeDecorator('HtmlTag');
        
        $this->addElements(array($login,$senha));
        
        $this->addElement(
                'submit',   'Entrar',   array(
                    'ignore'    =>  true,
                    'class'     => 'btn btn-lg btn-primary btn-block',
                )
                );
                
    }

}