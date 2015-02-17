<?php

namespace Domain\Model;

//use Zend\Debug\Debug;

abstract class DomainObject
{
    protected $id;

    public function __construct ($args)
    {
        foreach ($args as $key => $value)
        {
            $key = lcfirst(ucwords(strtolower(trim((string)$key))));
            if (property_exists($this, $key))
            {
                $this->$key = (isset($value)) ? $value : null;
            } else {
                //throw new \Exception ("Property " . $key . " does not exist.");
            }
        }
    }

    public function getId ( )
    {
        return $this->id;
    }
}