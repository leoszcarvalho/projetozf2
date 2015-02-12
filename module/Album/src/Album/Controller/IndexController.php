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
        
        $form = new AlbumForm();
        
        $inputFilter = new FormFilter();
        
        $request = $this->getRequest();
        
         if($request->isPost())
         {
           $params = $request->getPost()->toArray();


           $form->setData($params);

           $form->setInputFilter($inputFilter->getInputFilter());

           if($form->isValid())
           {
             $album = new Album();
             
             $album->exchangeArray($form->getData());
             $this->getAlbumTable()->saveAlbum($album);
             
             return $this->redirect()->toRoute('album');

           }
           

         }  
         else
         {


         }
         
         return new ViewModel(array('form' => $form));
    
         
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

         $form->get('enviar')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($inputFilter->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getAlbumTable()->saveAlbum($album);

                 // Redirect to list of albums
                 return $this->redirect()->toRoute('album');
             }
         }

         
         
         return new ViewModel(array('form' => $form, 'id' => $id));
    
         
    }
    
    public function deleteAction()
    {
        return new ViewModel();
    }
    
    
    
}
