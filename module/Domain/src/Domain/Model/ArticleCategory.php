<?php

namespace Domain\Model;

interface ArticleCategory
{
	public function getTitle ( );

	public function getParent ( );
}