<?php

namespace Domain\Service;

use Domain\Model\Member;

interface MemberService
{
    public function getById ($memberId);

    public function authenticate ($username, $passwordHash);

    public function add ($args);

    public function remove ($memberId);
}