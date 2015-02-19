<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Autenticacao\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class IndexController extends AbstractActionController
{
     
     protected $usuariosTable;
     
     public function getUsuariosTable()
     {
         if (!$this->usuariosTable) {
             $sm = $this->getServiceLocator();
             $this->usuariosTable = $sm->get('Autenticacao\Model\LoginTable');

         }
         return $this->usuariosTable;
     }
     
    public function indexAction()
    {
        
        
        $this->getUsuariosTable()->login("uno","dos");
        
        $view =  new ViewModel();
        
       
        //DESATIVA O LAYOUT DE QUALQUER VIEW
        //return $view->setTerminal(true);
    
        
    }
    
    public function outraAction()
    {
        
        $sessao = new Container('Autenticacao');

        var_dump($sessao->identidade);
        
        $view =  new ViewModel();
        
       
        //DESATIVA O LAYOUT DE QUALQUER VIEW
        //return $view->setTerminal(true);
    
        
    }
    
}
