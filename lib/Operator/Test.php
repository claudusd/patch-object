<?php

namespace Claudusd\PatchObject\Operator;

use Symfony\Component\PropertyAccess\PropertyAccess;

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
    public function __construct($path, $from)
    {
        parent::__construct($path);
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
