<?php

namespace Claudusd\PatchObject;

class Executor
{
    protected $propertyAccessor;

    public function __construct()
    {
        $this->propertyAccessor = new PropertyAccessor();        
    }
    
    public function get($path, $target)
    {
        $tmp = $target;
        foreach(explode('/', $path) as $property) {
            if (strlen($property) > 0)
                $tmp = $this->propertyAccessor->get($tmp, $property);
        }
        return $tmp;
    }
    
    public function add($target, $value)
    {

    }

    public function remove($target, $value)
    {

    }
}
