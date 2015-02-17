<?php

namespace Domain\Model;

class NativeMember
extends DomainObject
implements Member
{
	protected $username;
	protected $passwordHash;
	protected $permissions;

	public function __construct ($args)
	{
		parent::__construct($args);
	}

	public function getUsername ( )
	{
		return $this->username;
	}

	public function getPasswordHash ( )
	{
		return $this->passwordHash;
	}

	public function doesHavePermission ($permission)
	{
		$idOfPermissionToCheck = $permission->getId( );
		foreach ($this->permissions as $grantedPermission)
		{
			if ($grantedPermission->getId( ) == $idOfPermissionToCheck)
			{
				return true;
			}
		}
		return false;
	}
}