<?php

namespace Domain\Service;

use Domain\Mapper\DomainMapper;

abstract class DomainService
{
    protected $mapper;

    public function __construct (DomainMapper $mapper)
    {
        $this->mapper = $mapper;                
    }
}