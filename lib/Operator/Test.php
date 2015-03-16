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
        
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'test';
    }
}
