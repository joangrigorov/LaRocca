<?php

namespace App\Form;

class CallRecord extends \Zend_Form
{
    
    public function init()
    {
        $this->setView(new \Zend_View())
             ->setMethod('post')
             ->setDecorators(array(
                 'FormElements', array('HtmlTag', array('tag' => 'div')), 'Form'
             ));
        
        $decorators = array(
            'ViewHelper', 'Errors', 'Description', 
            'Label', array('HtmlTag', array('tag' => 'fieldset'))
        );
        
        $this->addElement('text', 'phone', array(
            'label' => 'Телефон',
            'required' => true,
            'filters' => array('StripTags', 'StringTrim'),
            'decorators' => $decorators
        ));
        
        $this->addElement('textarea', 'content', array(
            'label' => 'Описание',
            'required' => true,
            'attribs' => array('class' => 'editor'),
            'filters' => array('StripTags', 'StringTrim'),
            'decorators' => $decorators
        ));
        
        $this->addElement('text', 'name', array(
            'label' => 'Име',
            'required' => false,
            'filters' => array('StripTags', 'StringTrim'),
            'decorators' => $decorators
        ));
        
        $this->addElement('text', 'date', array(
            'label' => 'Дата',
            'required' => false,
            'attribs' => array('class' => 'date-picker'),
            'filters' => array('StripTags', 'StringTrim'),
            'decorators' => $decorators
        ));
        
        $this->addElement('submit', 'submit', array(
            'label' => 'Добави',
            'ignore' => true,
            'attribs' => array('class' => 'alt_btn'),
            'decorators' => array(
                'ViewHelper', 
                array('HtmlTag', array('tag' => 'div', 'class' => 'submit_link'))
            )
        ));
        
        $this->addDisplayGroup(array('phone', 'content', 'name', 'date'), 'elements', array(
            'decorators' => array(
                'FormElements', array('HtmlTag', array('tag' => 'div', 'class' => 'module_content'))
            )
        ));
        
        $this->addDisplayGroup(array('submit'), 'footer', array(
            'decorators' => array(
                'FormElements',
                array('HtmlTag', array('tag' => 'footer'))
            )
        ));
        
//         var_dump(array_keys($this->getDisplayGroup('elements')->getDecorators()));
//         die;
    }
    
}