<?php

namespace Domain\Service;

use Domain\Model\NativeArticle;
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
        $result = $this->mapper->getById($articleId);
        foreach ($result as $row)
        {
            return new NativeArticle($row);
        }
    }

    public function getAllActual ( )
    {
        $articles = array ( );
        $result = $this->mapper->getAllActual( );
        foreach ($result as $row)
        {
            $articles[] = new NativeArticle($row);
        }
        return $articles;
    }

    public function getAllActualUnderCategory ($articleCategoryId)
    {
        $articles = array ( );
        $result = $this->mapper->getAllActualUnderCategory($articleCategoryId);
        foreach ($result as $row)
        {
            $articles[] = new NativeArticle($row);
        }
        return $articles;
    }
}