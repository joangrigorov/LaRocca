<?php

namespace App\Form;

class LoginForm extends \Zend_Form
{
    
    public function init()
    {
        $this->setView(new \Zend_View())
             ->setMethod('post')
             ->setDecorators(array(
                 'FormElements', array('HtmlTag', array('tag' => 'div')), 'Form'
             ));
        
        
     $this->setAttrib('class', 'form-signin');
        
        $decorators = array(
            'ViewHelper', 'Errors', 'Description', 
            'Label', array('HtmlTag', array('tag' => 'fieldset'))
        );
        
       
        $this->addElement('text', 'username', array(
            'label' => 'Потребител',
            'required' => true,
            'filters' => array('StripTags', 'StringTrim'),
            'attribs' => array('class' => 'input-block-level', 'placeholder' => 'Потребителско име'),
            'decorators' => $decorators
        ));
        
        $this->addElement('password', 'password', array(
            'label' => 'Парола',
            'required' => true,
            'filters' => array('StripTags', 'StringTrim'),
            'attribs' => array('class' => 'input-block-level', 'placeholder' => 'Парола'),
            'decorators' => $decorators
        ));
        
     
        $this->addElement('submit', 'submit', array(
            'label' => 'Влез',
            'ignore' => true,
            'attribs' => array('class' => 'btn btn-large btn-primary'),
            'decorators' => array(
                'ViewHelper', 
                array('HtmlTag', array('tag' => 'div'))
            )
        ));
        
        $this->addDisplayGroup(array('name', 'password'), 'elements', array(
            'decorators' => array(
                'FormElements', array('HtmlTag', array('tag' => 'div'))
            )
        ));
        
        $this->addDisplayGroup(array('submit'), 'footer', array(
            'decorators' => array(
                'FormElements',
                array('HtmlTag', array('tag' => 'footer'))
            )
        ));
    }
    
}