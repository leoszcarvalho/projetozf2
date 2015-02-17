<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\Album;
use Album\Form\AlbumForm;
use Album\Form\FormFilter;

class IndexController extends AbstractActionController
{
    
    protected $albumTable;
    
    public function getAlbumTable()
     {
         if (!$this->albumTable) {
             $sm = $this->getServiceLocator();
             $this->albumTable = $sm->get('Album\Model\AlbumTable');
         }
         return $this->albumTable;
     }
    
    public function indexAction()
    {

        return new ViewModel(array('albums' => $this->getAlbumTable()->fetchAll()));
    }
    
    
    public function addAction()
    {
        
        if(!isset($erro))
        {
            $erro = "";
        }
        
        $form = new AlbumForm();
        
        $inputFilter = new FormFilter();
        
        $request = $this->getRequest();
        
         if($request->isPost())
         {
           //$params = $request->getPost()->toArray();
           
             $array_post = $request->getPost()->toArray();
             $array_files = $request->getFiles()->toArray();

           $post = array_merge_recursive(
            $array_post,
            $array_files
            );
           
           
           
           $form->setData($post);

           $form->setInputFilter($inputFilter->getInputFilter());
           
           if(!empty($array_files['arq_imagem']['name'] && $array_files['arq_texto']['name']))
           {
               //Se o usuário tiver enviado os arquivos
               
               if($form->isValid())
               {
                   
                 $album = new Album();

                 $data = $form->getData();


                 $album->exchangeArray($data);
                 $this->getAlbumTable()->saveAlbum($album);

                 return $this->redirect()->toRoute('album');

              }
           }
           else
           {
               
              $erro = "É necessário enviar os dois arquivos";
              
           }
           
           
           

         }  
         
         
         return new ViewModel(array('form' => $form, 'erro' => $erro));
    
         
    }
    
    public function editAction()
    {
        
        
        
        $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('album', array(
                 'action' => 'add'
             ));
         }
         
        

         // Get the Album with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $album = $this->getAlbumTable()->getAlbum($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('album', array(
                 'action' => 'index'
             ));
         }
         

         $form  = new AlbumForm();
         
         $inputFilter = new FormFilter();

         $form->bind($album);
                       //die();

         $form->get('enviar')->setAttribute('value', 'Salvar');

         $request = $this->getRequest();
         
         
         if ($request->isPost()) {
             
             $post = array_merge_recursive(
            $request->getPost()->toArray(),
            $request->getFiles()->toArray()
            );

           $form->setData($post);

           $form->setInputFilter($inputFilter->getInputFilter());
             
             
                
             if ($form->isValid()) {
                 
                 

                 $this->getAlbumTable()->saveAlbum($album);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('album');
             }
         }

         
         
         return new ViewModel(array('form' => $form, 'id' => $id, 'album' => $album));
    
         
    }
    
    public function deleteAction()
    {
        
         $id = (int) $this->params()->fromRoute('id', 0);
         
         if (!$id) {
             return $this->redirect()->toRoute('album');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getAlbumTable()->deleteAlbum($id);
             }

             // Redirect to list of albums
             return $this->redirect()->toRoute('album');
         }

         
        
        return new ViewModel(array('id'    => $id,
                                   'album' => $this->getAlbumTable()->getAlbum($id),
                ));
    }
    
    
    
}
