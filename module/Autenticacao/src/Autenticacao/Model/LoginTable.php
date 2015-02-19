<?php

namespace Autenticacao\Model;

 use Zend\Db\TableGateway\TableGateway;
 use Zend\Authentication\Adapter\DbTable as AuthAdapter;
 use Zend\Db\Adapter\Adapter as DbAdapter;
 //use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;
 use Zend\Session\Container;
 
 class LoginTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function login($usuario, $senha)
     {
         
         $dbAdapter = new DbAdapter(array(
                'driver'   => 'Mysqli',
                'database' => 'webdb',
                'username' => 'root',
                'password' => 'hulk3005'
            ));
         
        $authAdapter = new AuthAdapter($dbAdapter);
        
        
        $authAdapter
            ->setTableName('usuarios')
            ->setIdentityColumn('login')
            ->setCredentialColumn('senha')
            ->setCredentialTreatment('SHA1(?)');
        
        // Set the input credential values (e.g., from a login form)
        $authAdapter
            ->setIdentity($usuario)
            ->setCredential($senha);
        
        
        
        if($authAdapter->authenticate()->isValid())
        {
            
                $sessao = new Container('Autenticacao');
                $sessao->identidade = $authAdapter->getResultRowObject();
                var_dump($sessao->identidade);
                //return $authAdapter->getResultRowObject();
            
            
        }
        else
        {
            
            return false;
            
        }
        
     }
     
 }