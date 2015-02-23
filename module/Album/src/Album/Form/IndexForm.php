<?php

namespace Album\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class IndexForm extends Form
{
    
   
    
    

    public function __construct()
    {
        
        parent::__construct('album', array());
        
                
        
        $this->setAttributes(array('method' => 'post', 'enctype' => 'multipart/form-data', 'action' => '/album/index/multidelete'));
        
        
        $delete = new Element\Checkbox('delete[]');
        $delete->setUseHiddenElement(true)
                ->setUncheckedValue(null)
                ->setAttributes(array(
                  'class' => 'dele'
                ));
        
        $submit = new Element\Submit();
        $submit->setName('deletar')
               ->setValue('Deletar')
               ->setAttributes(array(
                   'class' => 'btn btn-primary'
               ));
        
               
               $this->add($delete);
               $this->add($submit);
    }
    
}
