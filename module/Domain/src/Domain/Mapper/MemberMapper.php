<?php

namespace Domain\Mapper;

use Domain\Model\Member;

interface MemberMapper
{
    public function getById ($memberId);

    public function authenticate ($username, $passwordHash);

    public function add ($args);

    public function remove ($memberId);
}