<?php

namespace ControlPanel\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ControlPanel\Controller\IndexController;

class IndexControllerFactory
implements FactoryInterface
{
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        return new IndexController ( );
    }
}