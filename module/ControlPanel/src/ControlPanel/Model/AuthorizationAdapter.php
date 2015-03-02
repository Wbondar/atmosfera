<?php

namespace ControlPanel\Model;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

use Domain\Service\MemberService;
use Domain\Model\Member;

class AuthenticationAdapter
implements AdapterInterface
{
	protected $memberService;
	protected $username;
	protected $passwordHash;

	public function __construct 
	(
		  MemberService $memberService
		, $username
		, $password
	)
	{
		$this->memberService = $memberService;
		$this->usernamer     = $usernamer;
		$this->passwordHash  = $password;
	}

	public function authenticate ( )
	{
		try
		{
			$member = $this->memberService->authenticate($this->username, $this->passwordHash);
			if ($member instanceof Member)
			{
				return Result::SUCCESS;
			} else {
				return Result::FAILURE_IDENTITY_NOT_FOUND;
			}
		} catch (\Exception $e) {
			return Result::FAILURE;
		}
	}
}