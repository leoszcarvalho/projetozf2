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
use Autenticacao\Form\LoginForm;
use Autenticacao\Form\LoginFilter;

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
        //Verifica se o usuário já está logado
        $sessao = new Container('Autenticacao');
        
        //Se não houver dados na sessão de identidade redireciona pro album
        if($sessao->identidade != null)
        {
            $this->redirect()->toRoute('album');
        }
        
        $form  = new LoginForm();
         
        $inputFilter = new LoginFilter();

        $request = $this->getRequest();
         
         if ($request->isPost()) 
         {
            $post = $request->getPost();
            
            $login = $post->login;
            $senha = $post->senha;
            
            
            $form->setData($post);

            $form->setInputFilter($inputFilter->getInputFilter());
            
            
            if($form->isValid())
            {
                   if($this->getUsuariosTable()->login($login,$senha) == true)
                   {
                       //die("<script>alert('Bem vindo $login');self.location='album';</script>");
                       $this->redirect()->toRoute('album');
             
                       
                   }
                   else
                   {
                       die("<script>alert('Login e senha incorretos');self.location='autenticacao';</script>");
                       
                   }

            }
              
         }
        
         return new ViewModel(array('form' => $form));
        
       
        //DESATIVA O LAYOUT DE QUALQUER VIEW
        //return $view->setTerminal(true);
    
        
    }
    
    public function logoutAction()
    {
        
        $sessao = new Container('Autenticacao');

        $sessao->getManager()->getStorage()->clear();
        
        $this->redirect()->toRoute('autenticacao');
       
        //DESATIVA O LAYOUT DE QUALQUER VIEW
        //return $view->setTerminal(true);
    
        
    }
    
}
