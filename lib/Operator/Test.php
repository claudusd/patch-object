<?php

namespace Claudusd\PatchObject\Operator;

use Claudusd\PatchObject\Executor;

/**
 *
 */
class Test extends Operator
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

    public function getValue()
    {
        return $this->value;
    }

    public function execute($target)
    {
        
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'test';
    }
}
