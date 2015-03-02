<?php

namespace Domain\Model;

interface Article
{
    public function getTitle ( );

    public function getCategoryId ( );

    public function getAuthorId ( );

    public function getContent ( );

    public function getPreview ( );
}