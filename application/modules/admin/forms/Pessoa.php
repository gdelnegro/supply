<?php

class Admin_Form_Pessoa extends Twitter_Form
{

    public function init()
    {
        $this->setMethod('post');
        
        $this->setAttrib('class','form-sigin');
        $this->setAttrib('role','form');
        
        /* Form Elements & Other Definitions Here ... */
        $id = new Zend_Form_Element_Hidden('id');
        
        $nome = new Zend_Form_Element_Text('nome');
        $nome->setAttrib('class', 'form-control')
                ->removeDecorator('HtmlTag');
        
        $emailContato = new Zend_Form_Element_Text('emailContato');
        $emailContato->setAttrib('class', 'form-control')
                ->removeDecorator('HtmlTag');
        
        $this->addElements(array(
            $id,
            $nome,
            $emailContato
        ));
        
        $this->addElement(
                'submit',   'Enviar',   array(
                    'ignore'    =>  true,
                    'class'     => 'btn btn-lg btn-primary btn-block',
                )
                );
    }


}

