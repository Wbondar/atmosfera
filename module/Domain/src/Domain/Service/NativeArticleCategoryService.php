<?php

namespace Domain\Service;

use Domain\Model\NativeArticleCategory;
use Domain\Mapper\ArticleCategoryMapper;

class NativeArticleCategoryService
extends DomainService
implements ArticleCategoryService
{
	public function __construct (ArticleCategoryMapper $mapper)
	{
		parent::__construct($mapper);
	}

	
	public function getArticleCategoryById ($id)
	{

	}
}