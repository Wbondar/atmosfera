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
        
        $name = "ControlPanel\Form\AddArticleForm";
        if ($serviceLocator->get('FormElementManager')->has($name))
        {
            $articleForm = $serviceLocator->get('FormElementManager')->get($name);
        } else {
            throw new \Exception ("Unable to locate " . $name . ".");
        }

        return new ArticleController ($articleService, $articleForm);
    }
}