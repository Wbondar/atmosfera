<?php

namespace Domain\Model;

class NativeArticleCategory
extends DomainObject
implements ArticleCategory
{
    protected $title;

    public function __construct ($args)
    {
        parent::__construct($args);
    }

    public function getTitle ( )
    {
        return $this->title;
    }
}