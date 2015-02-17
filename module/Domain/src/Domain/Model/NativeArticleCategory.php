<?php

namespace Domain\Model;

class NativeArticleCategory
extends DomainObject
implements ArticleCategory
{
    protected $title;
    protected $parent;

    public function __construct ($args)
    {
        parent::__construct($args);
    }

    public function getTitle ( )
    {
        return $this->title;
    }

    public function getParent ( )
    {
    	return $this->parent;
    }
}