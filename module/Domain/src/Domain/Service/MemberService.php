<?php

namespace Domain\Service;

use Domain\Model\Member;

interface MemberService
{
    public function getById ($memberId);

    public function authenticate ($username, $plainPassword);
}