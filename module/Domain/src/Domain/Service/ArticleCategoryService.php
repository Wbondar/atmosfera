<?php

namespace Domain\Serivce;

use Domain\Model\ArticleCategory;

interface ArticleCategoryService
{
    public function getById ($articleCategoryId);
}
