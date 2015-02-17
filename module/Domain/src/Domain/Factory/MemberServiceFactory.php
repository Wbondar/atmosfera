<?php

namespace Domain\Factory;

use Domain\Service\NativeMemberService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MemberServiceFactory
implements FactoryInterface
{
	public function createService (ServiceLocatorInterface $serviceLocator)
	{
		$name = 'Domain\Mapper\MemberMapper';
		//$serviceLocator = $serviceLocator->getServiceLocator( );
		if ($serviceLocator->has($name))
		{
			return new NativeMemberService($serviceLocator->get($name));
		} else {
			throw new Exception ("Cannot locate " . $name . ".");
		}
	}
}