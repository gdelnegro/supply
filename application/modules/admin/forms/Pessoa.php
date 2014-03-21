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
                ->setAttrib('placeholder','Nome')
                ->removeDecorator('HtmlTag');
        
        $emailContato = new Zend_Form_Element_Text('emailContato');
        $emailContato->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','Email de contato')
                ->removeDecorator('HtmlTag');
        
        $telefonePrincipal = new Zend_Form_Element_Text('telefonePrincipal');
        $telefonePrincipal->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','Telefone de Contato')
                ->removeDecorator('HtmlTag');
        
        $senha = new Zend_Form_Element_Password('senha');
        $senha->setAttrib('class', 'form-control')
                ->setAttrib('placeholder','Senha')
                ->removeDecorator('HtmlTag');
        
        $tipoPessoa = new Zend_Form_Element_Select('tipoPessoa');
        $tipoPessoa->setAttrib('class', 'form-control')
                ->addMultiOptions(array(
                    '0'=>'Selecione Tipo de Pessoa',
                    '1'=>'Física',
                    '2'=>'Jurídica'
                ))
                ->removeDecorator('HtmlTag');
        
        $grupo = new Zend_Form_Element_Select('grupo');
        $grupo->setAttrib('class', 'form-control')
                ->addMultiOptions(array(
                    '0'=>'Selecione',
                    '1'=>'Administrador Sistema',
                    '2'=>'Jurídica'
                ))
                ->removeDecorator('HtmlTag');
        
        $this->addElements(array(
            $id,
            $nome,
            $emailContato,
            $telefonePrincipal,
            $senha,
            $tipoPessoa,
            $grupo
        ));
        
        $this->addElement(
                'submit',   'Enviar',   array(
                    'ignore'    =>  true,
                    'class'     => 'btn btn-lg btn-primary btn-block',
                )
                );
    }


}

