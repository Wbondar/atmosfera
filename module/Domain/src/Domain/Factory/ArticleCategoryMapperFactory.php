<?php

namespace Domain\Factory;

use Domain\Mapper\NativeArticleCategoryMapper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ArticleCategoryMapperFactory
implements FactoryInterface
{
	public function createService 
	(
		ServiceLocatorInterface $serviceLocator
	)
	{
		$name = 'Zend\Db\Adapter\Adapter';
		if ($serviceLocator->has($name))
		{
			return new NativeArticleCategoryMapper($serviceLocator->get($name));
		} else {
			throw new \Exception ("Cannot locate " . $name . ".");
		}
	}
}