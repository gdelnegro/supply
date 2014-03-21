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
                ->setLabel('TESTE');
        
        $CEP = new Zend_Form_Element_Text('CEP');
        $CEP->removeDecorator('HtmlTag');
        
        $logradouro = new Zend_Form_Element_Text('logradouro');
        $logradouro->removeDecorator('HtmlTag');
        
        $complemento = new Zend_Form_Element_Text('complemento');
        $complemento->removeDecorator('HtmlTag');
        
        $numero = new Zend_Form_Element_Text('numero');
        $numero->removeDecorator('HtmlTag');
        
        $cidade = new Zend_Form_Element_Text('cidade');
        $cidade->removeDecorator('HtmlTag');
        
        $estado = new Zend_Form_Element_Text('estado');
        $estado->removeDecorator('HtmlTag');
        
        $pais = new Zend_Form_Element_Text('pais');
        $pais->removeDecorator('HtmlTag');
        
        $bairro = new Zend_Form_Element_Text('bairro');
        $bairro->removeDecorator('HtmlTag');
        
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
    }


}

