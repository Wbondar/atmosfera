<?php

namespace Domain\Service;

use Domain\Model\Article;
use Domain\Model\NativeArticle;
use Domain\Model\ArticleCategory;
use Domain\Model\NativeArticleCategory;
use Domain\Mapper\ArticleMapper;

class NativeArticleService
extends DomainService
implements ArticleService
{
    public function __construct (ArticleMapper $mapper)
    {
        parent::__construct($mapper);
    }

    public function getById ($articleId)
    {
        $resultSet = $this->mapper->getById($articleId);
        foreach ($resultSet as $row)
        {
            return new NativeArticle($row);
        }
    }

    public function getAll ( )
    {
        $articles = array ( );
        $resultSet = $this->mapper->getAll( );
        foreach ($resultSet as $row) 
        {
            $articles[] = new NativeArticle($row);
        }
        return $articles;
    }

    public function getAllActual ( )
    {
        $articles = array ( );
        $resultSet = $this->mapper->getAllActual( );
        foreach ($resultSet as $row)
        {
            $articles[] = new NativeArticle($row);
        }
        return $articles;
    }

    public function getUnderCategory ($articleCategory)
    {
        if ($articleCategory instanceof ArticleCategory)
        {
            $articleCategoryId = $articleCategory->getId( );
        } else {
            $articleCategoryId = $articleCategory;
        }
        $articles = array ( );
        $resultSet = $this->mapper->getAll( );
        foreach ($resultSet as $row)
        {
            if ($row['category_id'] == $articleCategoryId)
            {
                $articles[] = new NativeArticle($row);
            }
        }
        return $articles;
    }

    public function getActualUnderCategory ($articleCategory)
    {
        if ($articleCategory instanceof ArticleCategory)
        {
            $articleCategoryId = $articleCategory->getId( );
        } else {
            $articleCategoryId = $articleCategory;
        }
        $articles = array ( );
        $resultSet = $this->mapper->getActualUnderCategory($articleCategoryId);
        foreach ($resultSet as $row)
        {
            $articles[] = new NativeArticle($row);
        }
        return $articles;
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

    public function remove ($articleId)
    {
        return $this->mapper->remove($articleId);
    }
}