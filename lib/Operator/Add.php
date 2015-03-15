<?php

namespace Claudusd\PatchObject\Operator;

use Claudusd\PatchObject\Executor;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 *
 */
class Add extends Operator
{
    /**
     *
     */
    protected $value;

    /**
     * 
     */
    public function __construct(Executor $executor, $path, $value)
    {
        parent::__construct($executor, $path);
        $this->value = $value;       
    }

    public function getValue()
    {
        return $this->value;
    }

    public function execute($target)
    {
        $this->executor->add($this->executor->get($this->path, $target), $value);
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'add';
    }
}
