<?php

namespace Claudusd\PatchObject\Operator;

use Claudusd\PatchObject\Executor;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 *
 */
class Copy extends Operator
{
    /**
     *
     */
    protected $from;

    /**
     * 
     */
    public function __construct(Executor $executor, $path, $from)
    {
        parent::__construct($executor, $path);
        $this->from = $from;       
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function execute($target)
    {
        $this->executor->add($this->executor->get($this->path, $target), $this->executor->get($this->from, $target));
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'copy';
    }
}
