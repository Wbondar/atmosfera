<?php

namespace Domain\Factory;

use Domain\Service\NativeArticleService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ArticleServiceFactory
implements FactoryInterface
{
	public function createService (ServiceLocatorInterface $serviceLocator)
	{
		$name = 'Domain\Mapper\ArticleMapper';
		//$serviceLocator = $serviceLocator->getServiceLocator( );
		if ($serviceLocator->has($name))
		{
			return new NativeArticleService($serviceLocator->get($name));
		} else {
			throw new Exception ("Cannot locate " . $name . ".");
		}
	}
}