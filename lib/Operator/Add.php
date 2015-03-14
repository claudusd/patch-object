<?php

namespace Claudusd\PatchObject\Operator;

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
    public function __construct($path, $value)
    {
        parent::__construct($path);
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
        return 'add';
    }
}
