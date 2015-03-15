<?php

namespace Claudusd\PatchObject;

class Executor
{
    protected $getter;

    public function __construct()
    {
        $this->getter = new Getter();        
    }
    
    public function addThing()
    {

    }

    public function get($path, $target)
    {
        $tmp = $target;
        foreach(explode('/', $path) as $property) {
            if (strlen($property) > 0)
                $tmp = $this->getter->get($tmp, $property);
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
