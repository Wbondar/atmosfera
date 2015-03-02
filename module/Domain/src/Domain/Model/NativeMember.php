<?php

namespace Domain\Model;

class NativeMember
extends DomainObject
implements Member
{
    protected $username;
    protected $nameFirst;
    protected $nameLast;

    public function __construct ($args)
    {
        parent::__construct($args);
    }

    public function getUsername ( )
    {
        return $this->username;
    }

    public function getNameFirst ( )
    {
        return $this->nameFirst;
    }

    public function getNameLast ( )
    {
        return $this->nameLast;
    }
}