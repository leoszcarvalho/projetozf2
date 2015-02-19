<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Autenticacao;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Autenticacao\Model\Login;
use Autenticacao\Model\LoginTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        
        
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractController', 'dispatch', function($e) {
        $controller = $e->getTarget();
        $controllerClass = get_class($controller);
        $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
        $config = $e->getApplication()->getServiceManager()->get('config');
        if (isset($config['module_layouts'][$moduleNamespace])) {
        $controller->layout($config['module_layouts'][$moduleNamespace]);
        }
        }, 100);
        
        $sm = $e->getApplication()->getServiceManager();

        $router = $sm->get('router');
        $request = $sm->get('request');
        $matchedRoute = $router->match($request);

        @$params = $matchedRoute->getParams();

        $controll = $params['controller'];
        $action = $params['action'];

        $module_array = explode('\\', $controll);
        $module = $module_array[0];

        $route = $matchedRoute->getMatchedRouteName();

        $e->getViewModel()->setVariables(
            array(
                'CURRENT_MODULE_NAME' => $module,
                'CURRENT_CONTROLLER_NAME' => $controll,
                'CURRENT_ACTION_NAME' => $action,
                'CURRENT_ROUTE_NAME' => $route,
            )
        );
        
        
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Autenticacao\Model\LoginTable' =>  function($sm) {
                     $tableGateway = $sm->get('LoginTableGateway');
                     $table = new LoginTable($tableGateway);
                     return $table;
                 },
                 'LoginTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Login());
                     return new TableGateway('usuarios', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
    
}
