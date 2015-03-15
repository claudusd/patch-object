<?php

namespace Claudusd\PatchObject;

class Getter
{
    protected $reflectionClass;

    protected $reflectionProperty;

    public function __construct()
    {
        $this->reflectionClass = [];
        $this->reflectionProperty = [];
    }

    public function get($target, $property)
    {
        if (is_array($target)) {
            return $target[$property];
        }
        return $this->getValue($target, $property);
    }

    protected function getReflection($class)
    {
        if (!isset($this->reflectionClass[$class])) {
            $this->reflectionClass[$class] = new \ReflectionClass($class);
        }
        return $this->reflectionClass[$class];
    }

    protected function getPropertyReflection($target, $property)
    {
        $class = get_class($target);
        $hash = md5($class.$property);
        if (!isset($reflectionProperty[$hash])) {
            $reflection = $this->getReflection($class);
            $propertyReflection = $reflection->getProperty($property);
            $propertyReflection->setAccessible(true);
            $reflectionProperty[$hash] = $propertyReflection;
        }
        return $reflectionProperty[$hash];
    }
    
    protected function getValue($target, $property)
    {
        return $this->getPropertyReflection($target, $property)->getValue($target);
    }
}
