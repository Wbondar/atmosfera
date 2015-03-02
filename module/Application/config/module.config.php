<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array
    (
        'routes' => array
        (
            'home' => array
            (
                'type' => 'segment',
                'options' => array
                (
                    'route'    => '/[category/:id]'
                    , 'constraints' => array
                    (
                        'id' => '[1-9]\d*'
                    )
                    , 'defaults' => array
                    (
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index'
                    ),
                )
            )
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        )
        , 'aliases' => array(
            'translator' => 'MvcTranslator',
        )
    )
    , 'controllers' => array(
        'factories' => array(
            'Application\Controller\Index' => 'Application\Factory\IndexControllerFactory'
        ),
    )
    , 'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/application'      => __DIR__ . '/../view/layout/application.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            'application' => __DIR__ . '/../view',
        )
        , 'layout' => 'layout/application'
    )
    // Placeholder for console routes
    , 'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    )
    , 'module_layouts' => array
    (
        'Application' => 'layout/application'
    )
    , 'asset_manager' => array 
    (
        'resolver_configs' => array 
        (
            'paths' => array 
            (
                'Application' => __DIR__ . '/../pulbic'
            )
        )
    )
);
