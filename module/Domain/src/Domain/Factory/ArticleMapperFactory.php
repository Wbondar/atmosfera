<?php

namespace Domain\Factory;

use Domain\Mapper\NativeArticleMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ArticleMapperFactory
implements FactoryInterface
{
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        $name = 'Zend\Db\Adapter\Adapter';
        if ($serviceLocator->has($name))
        {
            return new NativeArticleMapper($serviceLocator->get($name));
        } else {
            throw new \Exception("Cannot locate " . $name . ".");
        }
    }
}