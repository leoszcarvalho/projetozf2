<?php

namespace Autenticacao\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class LoginForm extends Form
{

    public function __construct()
    {
        
        parent::__construct('login', array());
        
        $this->setAttributes(array('method' => 'post', 'enctype' => 'multipart/form-data'));
        //$this->setInputFilter(new AlbumFilter());
        
      
        
           
        $login = new Element\Text();
        $login->setName('login')
               ->setAttributes(array(
                    'placeholder' => 'Entre com o login',
                    'maxlenght' => 50
                ));
        
        
        $senha = new Element\Password();
        $senha->setName('senha')
              ->setAttributes(array(
                    'placeholder' => 'Entre com a senha',
                    'maxlenght' => 50
                ));
        
        
        
        
        $submit = new Element\Submit();
        $submit->setName('logar')
               ->setValue('Logar')
               ->setAttributes(array(
                   'class' => 'btn btn-primary'
               ));
        
               $this->add($login);
               $this->add($senha);
               $this->add($submit);
    }
    
}
