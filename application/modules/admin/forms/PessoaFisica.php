<?php

class Admin_Form_PessoaFisica extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');
        
        $this->setAttrib('class','form-sigin');
        $this->setAttrib('role','form');
        
        /* Form Elements & Other Definitions Here ... */
        $idPessoa = new Zend_Form_Element_Hidden('idPessoa');
        
        $CPF = new Zend_Form_Element_Text('CPF');
        $CPF->setAttrib('class', 'form-control')
                ->removeDecorator('HtmlTag');
        
        $RG = new Zend_Form_Element_Text('RG');
        $RG->setAttrib('class', 'form-control')
                ->removeDecorator('HtmlTag');
        
        $dtNascimento = new Zend_Form_Element_Text('dtNascimento');
        $dtNascimento->setAttrib('class', 'form-control')
                ->removeDecorator('HtmlTag');
        
        $nomeMae = new Zend_Form_Element_Text('nomeMae');
        $nomeMae->setAttrib('class', 'form-control')
                ->removeDecorator('HtmlTag');
        
        
        
        $this->addElements(array(
            $idPessoa,
            $CPF,
            $RG,
            $nomeMae
        ));
        
        $this->addElement(
                'submit',   'Enviar',   array(
                    'ignore'    =>  true,
                    'class'     => 'btn btn-lg btn-primary btn-block',
                )
                );
    }


}

