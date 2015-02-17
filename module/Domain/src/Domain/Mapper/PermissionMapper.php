<?php

namespace Domain\Mapper;

interface PermissionMapper
{
	public function getById ($permissionId);

	public function getByTitle ($permissionTitle);
}