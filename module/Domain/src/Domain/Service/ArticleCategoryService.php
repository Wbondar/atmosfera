<?php

namespace Domain\Service;

interface ArticleCategoryService
{
    public function getById ($articleCategoryId);

    public function getAll ( );

    public function add ($args);

    public function modify ($args);

    public function remove ($articleCategoryId);
}
