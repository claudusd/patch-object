<?php

namespace Claudusd\PatchObject\Operator;

/**
 *
 */
abstract class Operator
{
    /**
     * @return string
     */
    protected $path;

    /**
     * 
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Get the name of operation
     * 
     * @return string
     */
    abstract public function getName();

    /**
     * 
     */
    abstract public function execute($target);

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
