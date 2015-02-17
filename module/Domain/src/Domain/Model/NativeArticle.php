<?php

namespace Domain\Model;

class NativeArticle
extends DomainObject
implements Article
{
    protected $title;
    protected $category;
    protected $content;

    public function __construct ($args)
    {
        parent::__construct($args);
    }

    public function getTitle ( )
    {
        return $this->title;
    }

    public function getCategory ( )
    {
        return $this->category;
    }

    public function getContent ( )
    {
        return $this->content;
    }
}