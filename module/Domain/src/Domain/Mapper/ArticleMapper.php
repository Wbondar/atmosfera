<?php

namespace Domain\Mapper;

use Domain\Model\Article;

interface ArticleMapper
{
	public function getAll ( );

	public function getAllActual ( );

	public function getById ($articleId);

	public function add ($args);

	public function modify ($args);

	public function remove ($articleId);
}