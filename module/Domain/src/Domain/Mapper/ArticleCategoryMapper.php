<?php

namespace Domain\Mapper;

interface ArticleCategoryMapper
{
    public function getAll ( );

    public function getById ($articleCategoryId);
}