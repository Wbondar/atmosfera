<?php

namespace Domain\Factory;

use Domain\Service\NativeArticleCategoryService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ArticleCategoryServiceFactory
implements FactoryInterface
{
	public function createService (ServiceLocatorInterface $serviceLocator)
	{
		$name = 'Domain\Mapper\ArticleCategoryMapper';
		if ($serviceLocator->has($name)) 
		{
			return new NativeArticleCategoryService($serviceLocator->get($name));
		} else {
			throw new Exception ('Cannot locate ' . $name . ".");
		}
	}
}