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
        
        $nomeMae = new Zend_Form_Element_Text('nomeMae');
        $nomeMae->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','Nome da Mãe')
                ->removeDecorator('HtmlTag');
        
        $CPF = new Zend_Form_Element_Text('CPF');
        $CPF->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','CPF')
                ->removeDecorator('HtmlTag');
        
        $RG = new Zend_Form_Element_Text('RG');
        $RG->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','RG')
                ->removeDecorator('HtmlTag');
        
        $dtNascimento = new Zend_Form_Element_Text('dtNascimento');
        $dtNascimento->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','Data de Nascimento')
                ->removeDecorator('HtmlTag');
        
        $this->addElements(array(
            $idPessoa,
            $nomeMae,
            $CPF,
            $RG,
            $dtNascimento
        ));
        
        $this->addElement(
                'submit',   'Enviar',   array(
                    'ignore'    =>  true,
                    'class'     => 'btn btn-lg btn-primary btn-block',
                )
                );
    }


}

