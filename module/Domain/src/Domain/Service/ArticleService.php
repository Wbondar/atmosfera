<?php

namespace Domain\Service;

use Domain\Model\Article;

interface ArticleService
{
	public function getAllActual ( );

	public function getById ($articleId);
}