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
use Album\Model\Extras;

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
        
        $type = $this->params()->fromRoute('type','title');
        $order = $this->params()->fromRoute('order','ASC');
        
        $verificacao = new Extras();
        $order = $verificacao->determinaOrdem($order);
        
        
        if($order == false){$this->redirect()->toRoute('album');}
        
        if($verificacao->existe($type) == false){$this->redirect()->toRoute('album');}
         
        // grab the paginator from the AlbumTable
        $paginator = $this->getAlbumTable()->fetchAll(true,$type,$order);
        
        
        //die();
        
        // set the current page to what has been passed in query string, or to 1 if none set
        $paginator->setCurrentPageNumber((int) $this->params()->fromRoute('page', 1));
        // set the number of items per page to 10
        $paginator->setItemCountPerPage(10);
        
        $pagina = $this->params()->fromRoute('page', 1);
        
        
        return new ViewModel(array('paginator' => $paginator, 'pagina' => $pagina, 'tipo' => $type, 'ordem' => $order));
        
        //Retorna tudo em uma página só
        //return new ViewModel(array('albums' => $this->getAlbumTable()->fetchAll()));
        
        /*SELECT LIVRE NA PÁGINA
         * use Zend\Db\Sql\Sql;
           use Zend\Db\Adapter\Adapter;
             $this->tableGateway->adapter->
             $dbAdapterConfig = array(
            'driver'   => 'Mysqli',
            'database' => 'webdb',
            'username' => 'root',
            'password' => 'hulk3005'
            );
             
             $sql = "SELECT * FROM albums";
             
             $dbAdapter = new Adapter($dbAdapterConfig);
             
             $resultado = $dbAdapter->query($sql, \Zend\Db\Adapter\Adapter::QUERY_MODE_EXECUTE);
             
             $selecao = $resultado->toArray();
             
             print_r($selecao);
             */
        
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
