<?php

namespace Autenticacao\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\FileInput;

class LoginFilter implements InputFilterAwareInterface
{
    public function getInputFilter() 
    {
        $inputFilter = new InputFilter();
        $factory = new Factory();
        
        $inputFilter->add($factory->createInput(array(
            'name' => 'login',
            'required' => true,
            'filters' => array(
                array('name' => 'Zend\Filter\StripTags'),
                array('name' => 'Zend\Filter\StringTrim')),
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\NotEmpty',
                    'options' => array('messages' => array('isEmpty' => 'O campo não pode ser vazio'))
                )
              )
            )
                ));
        
        $stripTags = new \Zend\Filter\StripTags();
        $stringTrim = new \Zend\Filter\StringTrim();
        
        $notEmpty = new \Zend\Validator\NotEmpty();
        $notEmpty->setMessage("O campo não pode estar vazio", \Zend\Validator\NotEmpty::IS_EMPTY);
        
        $inputFilter->add($factory->createInput(array(
            'name' => 'senha',
            'required' => true,
            'filters' => array($stripTags,$stringTrim),
            'validators' => array($notEmpty)
            )
                ));
        
        
        
        
        return $inputFilter;
        
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter) 
    {
        
    }
}
