<?php

namespace Domain\Model;

interface Member
{
	public function getUsername ( );

	public function getPasswordHash ( );
}