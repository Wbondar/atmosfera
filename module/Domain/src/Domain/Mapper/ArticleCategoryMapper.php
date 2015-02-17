<?php

namespace Domain\Mapper;

use Domain\Model\ArticleCategory;

interface ArticleCategoryMapper
{
    public function getAll ( );

    public function getById ($articleCategoryId);

    public function getByTitle ($articleCategoryTitle);
}