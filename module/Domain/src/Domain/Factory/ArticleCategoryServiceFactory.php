<?php

namespace Domain\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Domain\Service\NativeArticleCategoryService;

class ArticleCategoryServiceFactory
implements FactoryInterface
{
	public function createService 
	(
		ServiceLocatorInterface $serviceLocator
	)
	{
		$name = 'Domain\Mapper\ArticleCategoryMapper';
		if ($serviceLocator->has($name)) 
		{
			return new NativeArticleCategoryService($serviceLocator->get($name));
		} else {
			throw new \Exception ('Failed to locate ' . $name . ".");
		}
	}
}