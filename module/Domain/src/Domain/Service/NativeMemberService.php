<?php

namespace Domain\Service;

use Domain\Model\Member;
use Domain\Model\NativeMember;
use Domain\Mapper\MemberMapper;

class NativeMemberService
extends DomainService
implements MemberService
{
    public function __construct (MemberMapper $mapper)
    {
        parent::__construct($mapper);
    }

    public function getById ($memberId)
    {
        $resultSet = $this->mapper->getById($memberId);
        foreach ($resultSet as $row)
        {
            $row['username'] = $row['email_address'];
            unset($row['email_address']);
            return new NativeMember($row);
        }
    }

    public function doesHavePermission ($memberId, $permissionTitle)
    {
        if ($this->getById($memberId) instanceof Member)
        {
            return true;
        }
        return false;
    }

    public function authenticate ($username, $passwordHash)
    {
        try
        {
            return $this->getById($this->mapper->authenticate($username, $passwordHash));
        } catch (\Exception $e) {
            throw new \Exception("Failed to authenticate member: " . $e->getMessage( ));
        }
    }

    public function grantPermission ($memberId, $permissionId)
    {
        $this->mapper->grantPermission($memberId, $permissionId);
    }

    public function revokePermission ($memberId, $permissionId)
    {
        $this->mapper->revokePermission($memberId, $permissionId);
    }

    public function add ($args)
    {
        $resultSet = $this->mapper->add($args);
        foreach($resultSet as $row)
        {
            return $this->getById($row['id']);
        }
    }

    public function remove ($memberId)
    {
        return $this->mapper->remove($memberId);
    }
}