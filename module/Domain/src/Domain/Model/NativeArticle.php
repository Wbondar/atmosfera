<?php

namespace Domain\Model;

class NativeArticle
extends DomainObject
implements Article
{
    protected $title;
    protected $categoryId;
    protected $publishedAt;
    protected $authorId;
    protected $preview;
    protected $content;

    public function __construct ($args)
    {
        parent::__construct($args);
    }

    public function getTitle ( )
    {
        return $this->title;
    }

    public function getCategoryId ( )
    {
        return $this->categoryId;
    }

    public function getContent ( )
    {
        return $this->content;
    }

    public function getDateOfPublication ( )
    {
        return $this->publishedAt;
    }

    public function getAuthorId ( )
    {
        return $this->authorId;
    }

    public function getPreview ( )
    {
        return $this->preview;
    }
}