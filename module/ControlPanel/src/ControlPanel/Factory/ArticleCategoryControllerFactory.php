<?php

namespace ControlPanel\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use ControlPanel\Controller\ArticleCategoryController;

class ArticleCategoryControllerFactory
implements FactoryInterface
{
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        $serviceLocator = $serviceLocator->getServiceLocator( );

        $name = "Domain\Service\ArticleCategoryService";
        if ($serviceLocator->has($name))
        {
            $articleCategoryService = $serviceLocator->get($name);
        } else {
            throw new \Exception ("Failed to locate " . $name . ".");
        }
        
        $name = "ControlPanel\Form\AddArticleCategoryForm";
        if ($serviceLocator->get('FormElementManager')->has($name))
        {
            $addArticleCategoryForm = $serviceLocator->get('FormElementManager')->get($name);
        } else {
            throw new \Exception ("Failed to locate " . $name . ".");
        }
        
        $name = "ControlPanel\Form\EditArticleCategoryForm";
        if ($serviceLocator->get('FormElementManager')->has($name))
        {
            $editArticleCategoryForm = $serviceLocator->get('FormElementManager')->get($name);
        } else {
            throw new \Exception ("Failed to locate " . $name . ".");
        }
        
        $name = "ControlPanel\Form\RemoveArticleCategoryForm";
        if ($serviceLocator->get('FormElementManager')->has($name))
        {
            $removeArticleCategoryForm = $serviceLocator->get('FormElementManager')->get($name);
        } else {
            throw new \Exception ("Failed to locate " . $name . ".");
        }

        return new ArticleCategoryController ($articleCategoryService, $addArticleCategoryForm, $editArticleCategoryForm, $removeArticleCategoryForm);
    }
}