<?php

namespace Domain\Model;

interface Member
{
	public function getUsername ( );

	public function getNameFirst ( );

	public function getNameLast ( );
}