<?php

namespace ControlPanel\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\SerivceManager\ServiceLocatorInterface;
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
            throw new Exception ("Unable to locate " . $name . ".");
        }
        
        $name = "ControlPanel\Form\ArticleCategoryForm";
        if ($serviceLocator->has('FormElementManager')->has($name))
        {
            $articleCategoryForm = $serviceLocator->get('FormElementManager')->get($name);
        } else {
            throw new Exception ("Unable to locate " . $name . ".");
        }

        return new ArticleCategoryController ($articleCategoryService, $articleCategoryForm);
    }
}