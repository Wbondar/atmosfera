<?php

namespace ControlPanel\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use ControlPanel\Controller\ArticleController;

class ArticleControllerFactory
implements FactoryInterface
{
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        $serviceLocator = $serviceLocator->getServiceLocator( );

        $name = "Domain\Service\ArticleService";
        if ($serviceLocator->has($name))
        {
            $articleService = $serviceLocator->get($name);
        } else {
            throw new \Exception ("Unable to locate " . $name . ".");
        }

        $name = "Domain\Service\ArticleCategoryService";
        if ($serviceLocator->has($name))
        {
            $articleCategoryService = $serviceLocator->get($name);
        } else {
            throw new \Exception ("Unable to locate " . $name . ".");
        }
        
        $name = "ControlPanel\Form\AddArticleForm";
        if ($serviceLocator->get('FormElementManager')->has($name))
        {
            $addArticleForm = $serviceLocator->get('FormElementManager')->get($name);
        } else {
            throw new \Exception ("Unable to locate " . $name . ".");
        }
        
        $name = "ControlPanel\Form\EditArticleForm";
        if ($serviceLocator->get('FormElementManager')->has($name))
        {
            $editArticleForm = $serviceLocator->get('FormElementManager')->get($name);
        } else {
            throw new \Exception ("Unable to locate " . $name . ".");
        }
        
        $name = "ControlPanel\Form\RemoveArticleForm";
        if ($serviceLocator->get('FormElementManager')->has($name))
        {
            $removeArticleForm = $serviceLocator->get('FormElementManager')->get($name);
        } else {
            throw new \Exception ("Unable to locate " . $name . ".");
        }

        return new ArticleController ($articleService, $articleCategoryService, $addArticleForm, $editArticleForm, $removeArticleForm);
    }
}