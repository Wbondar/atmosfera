<?php

namespace Domain\Service;

use Domain\Service\ArticleCategoryService;
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

    
    public function getById ($articleCategoryId)
    {
        $resultSet = $this->mapper->getById($articleCategoryId);
        foreach ($resultSet as $row)
        {
            return new NativeArticleCategory($row);
        }
    }

    public function getAll ( )
    {
        $articleCategories = array ( );
        $resultSet = $this->mapper->getAll( );
        foreach ($resultSet as $row)
        {
            $articleCategories[] = new NativeArticleCategory($row);
        }
        return $articleCategories;
    }

    public function add ($args)
    {
        $resultSet = $this->mapper->add($args);
        foreach ($resultSet as $row)
        {
            return $this->getById($row['id']);
        }
    }

    public function modify ($args)
    {
        return $this->mapper->modify($args);
    }

    public function remove ($articleCategoryId)
    {
        return $this->mapper->remove($articleCategoryId);
    }
}