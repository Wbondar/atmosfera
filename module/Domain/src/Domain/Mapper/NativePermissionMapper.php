<?php

namespace Domain\Mapper;

use Zend\Db\Adapter\AdapterInterface;

class NativePermissionMapper
extends DomainMapper
implements PermissionMapper
{
    public function __construct (AdapterInterface $dbAdapter)
    {
        parent::__construct($dbAdapter);
    }

    public function getById ($permissionId)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented.");
    }

    public function getByTitle ($permissionTitle)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented.");
    }
}