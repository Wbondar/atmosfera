<?php

namespace Domain\Service;

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

	public function authenticate ($username, $plainPassword)
	{
		return false;
	}

	public function getById ($memberId)
	{
		return false;
	}
}