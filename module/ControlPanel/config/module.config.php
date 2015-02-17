<?php

return array 
(   
    'service_manager' => array 
    (
        'invokables' => array 
        (
            'ControlPanel\Form\AddMemberForm' => 'ControlPanel\Form\AddMemberForm'
        )
    )
    , 'view_manager' => array 
    (
        'template_path_stack' => array 
        (
            __DIR__ . '/../view'
        )
    )
    , 'controllers' => array 
    (
        'factories' => array 
        (
              'ControlPanel\Controller\Index'           => 'ControlPanel\Factory\IndexControllerFactory'
            , 'ControlPanel\Controller\Member'          => 'ControlPanel\Factory\MemberControllerFactory'
            , 'ControlPanel\Controller\Article'         => 'ControlPanel\Factory\ArticleControllerFactory'
            , 'ControlPanel\Controller\ArticleCategory' => 'ControlPanel\Factory\ArticleCategoryControllerFactory'
        )
    )
    , 'router' => array
    (
        'routes' => array
        (
            'enter' => array
            (
                  'type'    => 'literal'
                , 'options' => array
                (
                      'route'    => '/cpanel'
                    , 'defaults' => array
                    (
                          'controller' => 'ControlPanel\Controller\Index'
                        , 'action'     => 'index'
                    )
                )
            )
            , 'add_member' => array 
            (
                  'type' => 'literal'
                , 'options' => array 
                (
                    'route' => '/cpanel/add/member'
                    , 'defaults' => array 
                    (
                          'controller' => 'ControlPanel\Controller\Member'
                        , 'action' => 'addMember'
                    )
                )
            )
            , 'add_article' => array 
            (
                  'type' => 'literal'
                , 'options' => array 
                (
                    'route' => '/cpanel/add/article'
                    , 'defaults' => array 
                    (
                          'controller' => 'ControlPanel\Controller\Article'
                        , 'action' => 'addArticle'
                    )
                )
            )
            , 'add_article_category' => array 
            (
                  'type' => 'literal'
                , 'options' => array 
                (
                      'route' => '/cpanel/add/category'
                    , 'defaults' => array 
                    (
                          'controller' => 'ControlPanel\Controller\ArticleCategory'
                        , 'action' => 'addArticleCategory'
                    )
                )
            )
        )
    )
);