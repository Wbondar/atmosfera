<?php

namespace Domain\Model;

interface Article
{
    public function getTitle ( );

    public function getCategory ( );

    public function getContent ( );
}