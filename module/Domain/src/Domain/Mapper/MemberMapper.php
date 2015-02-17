<?php

namespace Domain\Mapper;

use Domain\Model\Member;

interface MemberMapper
{
    public function getById ($memberId);

    public function authenticate ($username, $plainPassword);

    public function grantPermission ($memberId, $permissionId);

    public function revokePermission ($memberId, $permissionId);

    public function add ($username, $palinPassword);

    public function remove ($memberId);
}