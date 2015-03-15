<?php

namespace Claudusd\PatchObject\Operator;

use Claudusd\PatchObject\Executor;

/**
 *
 */
abstract class Operator
{
    /**
     * @var Executor
     */
    protected $executor;

    /**
     * @return string
     */
    protected $path;

    /**
     * 
     * @param string $path
     */
    public function __construct(Executor $executor, $path)
    {
        $this->executor = $executor;
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
