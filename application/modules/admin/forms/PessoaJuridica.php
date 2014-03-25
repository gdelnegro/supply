<?php

class Admin_Form_PessoaJuridica extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');
        $this->setAttrib('class','form-sigin');
        $this->setAttrib('role','form');
        
        /* Form Elements & Other Definitions Here ... */
        $idPessoa = new Zend_Form_Element_Hidden('idPessoa');
        
        $CNPJ = new Zend_Form_Element_Text('CNPJ');
        $CNPJ->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','CNPJ')
                ->removeDecorator('HtmlTag');        
        
        $dtFundacao = new Zend_Form_Element_Text('dtFundacao');
        $dtFundacao->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','Data de Fundação')
                ->removeDecorator('HtmlTag');
        
        $logo = new Zend_Form_Element_File('logo');
        $logo->setAttrib('class', 'form-control')
                ->setAttrib('placeholder', 'Logotipo')
                ->removeDecorator('HtmlTag');
        
        $this->addElements(array(
            $idPessoa,
            $CNPJ,
            $dtFundacao,
            $logo
        ));
        
        $this->addElement(
                'submit',   'Enviar',   array()
                );
    }


}

