<?php

return array 
(   
    'session' => array 
    (
          'remember_me_seconds' => 60 * 10
        , 'use_cookies'         => true 
        , 'cookie_httponly'     => true
    )
    , 'service_manager' => array 
    (
        'invokables' => array 
        (
              'ControlPanel\Form\ArticleFieldset'           => 'ControlPanel\Form\ArticleFieldset'
            , 'ControlPanel\Form\ArticleCategoryFieldset'   => 'ControlPanel\Form\ArticleCategoryFieldset'
            , 'ControlPanel\Form\MemberFieldset'            => 'ControlPanel\Form\MemberFieldset'
            , 'ControlPanel\Form\AddArticleForm'            => 'ControlPanel\Form\AddArticleForm'
            , 'ControlPanel\Form\EditArticleForm'           => 'ControlPanel\Form\EditArticleForm'
            , 'ControlPanel\Form\RemoveArticleForm'         => 'ControlPanel\Form\RemoveArticleForm'
            , 'ControlPanel\Form\AddArticleCategoryForm'    => 'ControlPanel\Form\AddArticleCategoryForm'
            , 'ControlPanel\Form\EditArticleCategoryForm'   => 'ControlPanel\Form\EditArticleCategoryForm'
            , 'ControlPanel\Form\RemoveArticleCategoryForm' => 'ControlPanel\Form\RemoveArticleCategoryForm'
            , 'ControlPanel\Form\AddMemberForm'             => 'ControlPanel\Form\AddMemberForm'
            , 'ControlPanel\Form\EditMemberForm'            => 'ControlPanel\Form\EditMemberForm'
            , 'ControlPanel\Form\RemoveMemberForm'          => 'ControlPanel\Form\RemoveMemberForm'
        )
    )
    , 'view_manager' => array 
    (
        'display_not_found_reason' => true
        , 'display_exceptions'       => true
        , 'doctype'                  => 'HTML5'
        , 'layout' => 'layout/control-panel'
        , 'template_map' => array(
            'layout/control-panel'           => __DIR__ . '/../view/layout/control-panel.phtml',
        )
        , 'template_path_stack' => array 
        (
            'control-panel'  => __DIR__ . '/../view'
        )
    )
    , 'module_layouts' => array
    (
        'ControlPanel' => 'layout/control-panel'
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
        , 'aliases' => array 
        (
              'index'    => 'ControlPanel\Controller\Index'
            , 'member'   => 'ControlPanel\Controller\Member'
            , 'article'  => 'ControlPanel\Controller\Article'
            , 'category' => 'ControlPanel\Controller\ArticleCategory'
        )
    )
    , 'router' => array
    (
        'routes' => array
        ( 
            'control-panel' => array
            (
                 'type'    => 'segment',
                 'options' => array
                 (
                     'route'    => '/cpanel[/:controller[/:action[/:id]]]',
                     'constraints' => array
                     (
                           'controller' => '[a-zA-Z][a-zA-Z0-9_-]*'
                         , 'action'     => '[a-z]*'
                         , 'id'         => '[1-9]\d*'
                     )
                     , 'defaults' => array
                     (
                           'controller' => 'ControlPanel\Controller\Index'
                         , 'action'     => 'index'
                     )
                 )
            )
        )
    )
);