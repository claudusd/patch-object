<?php

namespace Claudusd\PatchObject\Operator;

use Claudusd\PatchObject\Executor;

/**
 *
 */
class Move extends Operator
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
        $value = $this->executor->get($this->from, $target);
        $this->executor->remove($this->from, $target);
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'move';
    }
}
