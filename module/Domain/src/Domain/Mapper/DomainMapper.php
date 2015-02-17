<?php

namespace Domain\Mapper;

use Zend\Db\Adapter\AdapterInterface;

abstract class DomainMapper
{
    protected $dbAdapter;

    public function __construct (AdapterInterface $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }
}