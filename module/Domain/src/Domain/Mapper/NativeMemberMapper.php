<?php

namespace Domain\Mapper;

use Zend\Db\Adapter\AdapterInterface;

class NativeMemberMapper
extends DomainMapper
implements MemberMapper
{
    public function __construct (AdapterInterface $dbAdapter)
    {
        parent::__construct($dbAdapter);
    }

    public function getById ($memberId)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented");
    }

    public function authenticate ($username, $plainPassword)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented");
    }

    public function grantPermission ($memberId, $permissionId)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented");
    }

    public function revokePermission ($memberId, $permissionId)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented");
    }

    public function add ($username, $palinPassword)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented");
    }

    public function remove ($memberId)
    {
        throw new \Exception ("Trying to execute function which is not yet implemented");
    }
}