<?php

namespace Album\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Album\Form\AlbumFilter;
use Album\Model\AlbumTable;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;

class AlbumForm extends Form
{
    
    protected $albumTable;
    
    

    public function __construct()
    {
        
        parent::__construct('album', array());
        
                
        $dbAdapterConfig = array(
            'driver'   => 'Mysqli',
            'database' => 'webdb',
            'username' => 'root',
            'password' => 'hulk3005'
            );
        
            $dbAdapter = new Adapter($dbAdapterConfig);
         
            /*$select = new Select('midias');
            $select->columns(array('midia'));
            $sel = str_replace("\"", "", $select->getSqlString());*/
            
            $sel = "SELECT midia FROM midias ORDER BY id ASC";

            $resultado = $dbAdapter->query($sel,$dbAdapter::QUERY_MODE_EXECUTE);
            
            $resultSet = new ResultSet;

            $resultSet->initialize($resultado);
             
            $midias = array();
            $cont = 1;
            
             foreach($resultSet as $midia)
             {
                $midias[$cont] = $midia->midia;
                $cont++;
                
             }
            
                
        
        $this->setAttributes(array('method' => 'post', 'enctype' => 'multipart/form-data'));
        //$this->setInputFilter(new AlbumFilter());
        
        $id = new Element\Hidden();
        $id->setName('id');
        
           
        $artist = new Element\Text();
        $artist->setName('artist')
               ->setAttributes(array(
                    'placeholder' => 'Entre com o artista',
                    'maxlenght' => 50
                ));
        
        
        $title = new Element\Text();
        $title->setName('title')
              ->setAttributes(array(
                    'placeholder' => 'Entre com o título',
                    'maxlenght' => 50
                ));
        
        $tipo = new Element\Select('tipo');
        $tipo->setValueOptions($midias);
        $tipo->setEmptyOption("Selecione o tipo da mídia");
        
        
        $file = new Element\File('arq_imagem');
        $file->setAttribute('id', 'arq_imagem');
        
        $txt = new Element\File('arq_texto');
        $txt->setAttribute('id', 'arq_texto');
        
        
        
        $submit = new Element\Submit();
        $submit->setName('enviar')
               ->setValue('Enviar')
               ->setAttributes(array(
                   'class' => 'btn btn-primary'
               ));
        
               $this->add($id);
               $this->add($artist);
               $this->add($title);
               $this->add($tipo);
               $this->add($file);
               $this->add($txt);
               $this->add($submit);
    }
    
}
