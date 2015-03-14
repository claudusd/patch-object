<?php

namespace Claudusd\PatchObject\Operator;

use Symfony\Component\PropertyAccess\PropertyAccess;

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
        $accessor = PropertyAccess::createPropertyAccessor();
        $accessor->setValue($target, $this->path, $accessor->getValue($target, $this->from));
        $accessor->setValue($target, $this->from, null);
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'move';
    }
}
