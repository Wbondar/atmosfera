<?php

namespace Domain\Model;

use Zend\Stdlib\ArrayObject;

abstract class DomainObject
extends ArrayObject
{
    protected $id;

    public function __construct ($args)
    {
        foreach ($args as $key => $value)
        {
            $key = str_replace(' ', '', lcfirst(ucwords(strtolower(str_replace('_', ' ', trim((string)$key))))));
            if (property_exists($this, $key))
            {
                $this->$key = $value;
            } else {
                throw new \Exception ("Property " . $key . " does not exist.");
            }
        }
    }

    public function getId ( )
    {
        return $this->id;
    }
}