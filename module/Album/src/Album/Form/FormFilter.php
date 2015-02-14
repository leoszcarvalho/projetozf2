<?php

namespace Album\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\FileInput;

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
        
        
         // File Input
        
        
        // You only need to define validators and filters
        // as if only one file was being uploaded. All files
        // will be run through the same validators and filters
        // automatically.
        
        $size = new \Zend\Validator\File\Size('80 KB');
        
        $size->setMessages(array(\Zend\Validator\File\Size::TOO_BIG => 'O tamanho do arquivo excede o limite de 80 KB'));
        
        $imageSize = new \Zend\Validator\File\ImageSize(array('minheight' => 250, 'maxheight' => 400,
                                                              'minwidth' => 200, 'maxwidth' => 600));
        
        $imageSize->setMessages(array(\Zend\Validator\File\ImageSize::NOT_DETECTED => 'O tamanho da imagem não foi detectado'));
        
        $fileRenameFilter = new \Zend\Filter\File\RenameUpload(array(
                'target'    => './data/tmpuploads/',
                'useUploadName' => true,
                'randomize' => true,
            ));
        
        $validator = new \Zend\Validator\File\MimeType(array('magicFile' => false, 'mimeType' => 'image/png,image/jpg,image/jpeg'));
        
        $validator->setMessages(array(\Zend\Validator\File\MimeType::FALSE_TYPE => 'A imagem precisa estar em jpg ou png'));
        
        $inputFilter->add($factory->createInput(array(
            'name' => 'imagefile',
            'required' => true,
            'filters' => array($fileRenameFilter),
            'validators' => array($size, $imageSize, $validator)
            )
                ));
        
        $inputFilter->add($factory->createInput(array(
            'name' => 'txt',
            'required' => true,
            'filters' => array($fileRenameFilter),
            )
                ));
        
        /*Validação para upload Multiplo
        
         * $fileInput = new FileInput('image-file');
           $fileInput->setRequired(true);
         * 
         * $fileInput->getValidatorChain()->attach($size);
        $fileInput->getValidatorChain()->attach($imageSize);
        
        
        
        
        $fileInput->getFilterChain()->attach($fileRenameFilter);
        
        
        $inputFilter->add($fileInput);
        */
        
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
