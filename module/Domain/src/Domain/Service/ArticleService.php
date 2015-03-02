<?php

namespace Domain\Service;

use Domain\Model\Article;

interface ArticleService
{
	public function getAll ( );

	public function getAllActual ( );

	public function getUnderCategory ($category);

	public function getActualUnderCategory ($category);

	public function getById ($articleId);

	public function add ($args);

	public function modify ($args);

	public function remove ($articleId);
}