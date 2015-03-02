<?php

namespace Domain\Factory;

use Domain\Mapper\NativeMemberMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MemberMapperFactory
implements FactoryInterface
{
    public function createService (ServiceLocatorInterface $serviceLocator)
    {
        $name = 'Zend\Db\Adapter\Adapter';
        if ($serviceLocator->has($name))
        {
            return new NativeMemberMapper($serviceLocator->get($name));
        } else {
            throw new \Exception("Cannot locate " . $name . ".");
        }
    }
}