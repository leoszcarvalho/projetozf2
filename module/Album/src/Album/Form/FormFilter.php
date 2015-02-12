<?php

namespace Album\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class FormFilter implements InputFilterAwareInterface
{
    public function getInputFilter() 
    {
        $inputFilter = new InputFilter();
        $factory = new Factory();
        
        $inputFilter->add($factory->createInput(array(
            'name' => 'artist',
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
            'name' => 'title',
            'required' => true,
            'filters' => array($stripTags,$stringTrim),
            'validators' => array($notEmpty)
            )
                ));
        
        /*Validação para checar se os campos são iguais
        $confirmacao = new \Zend\Validator\Identical();
        
        $confirmacao->setToken('artist');
        
        $confirmacao->setMessage('Os campos são diferentes', \Zend\Validator\Identical::NOT_SAME);
        */
        
        //====================================================================================================
        
        /* Validação de email
        $emailAddress = new \Zend\Validator\EmailAddress();
        $emailAddress->setMessage('O email é inválido', \Zend\Validator\EmailAddress::INVALID_FORMAT);
         */
        
        
        
        
        return $inputFilter;
        
    }
    
    public function setInputFilter(InputFilterInterface $inputFilter) 
    {
        
    }
}
