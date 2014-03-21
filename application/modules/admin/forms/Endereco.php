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
                ->setLabel('CEP')
                ->setAttrib('placeholder', 'CEP');
        
        $logradouro = new Zend_Form_Element_Text('logradouro');
        $logradouro->removeDecorator('HtmlTag')
                ->setLabel('Logradouro')
                ->setAttrib('placeholder', 'Logradouro');
        
        $complemento = new Zend_Form_Element_Text('complemento');
        $complemento->removeDecorator('HtmlTag')
                ->setLabel('Complemento')
                ->setAttrib('placeholder', 'Complemento');
        
        $numero = new Zend_Form_Element_Text('numero');
        $numero->removeDecorator('HtmlTag')
                ->setLabel('Numero')
                ->setAttrib('placeholder', 'Numero');
        
        $cidade = new Zend_Form_Element_Text('cidade');
        $cidade->removeDecorator('HtmlTag')
                ->setLabel('Cidade')
                ->setAttrib('placeholder', 'Cidade');
        
        $estado = new Zend_Form_Element_Text('estado');
        $estado->removeDecorator('HtmlTag')
                ->setLabel('Estado')
                ->setAttrib('placeholder', 'Estado');
        
        $pais = new Zend_Form_Element_Text('pais');
        $pais->removeDecorator('HtmlTag')
                ->setLabel('País')
                ->setAttrib('placeholder', 'País');
        
        $bairro = new Zend_Form_Element_Text('bairro');
        $bairro->removeDecorator('HtmlTag')
                ->setLabel('Bairro')
                ->setAttrib('placeholder', 'Bairro');
        
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

