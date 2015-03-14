<?php

namespace Claudusd\PatchObject\Operator;

use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 *
 */
class Replace extends Operator
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
        $accessor = PropertyAccess::createPropertyAccessor();
        $accessor->setValue($target, $this->path, $this->value);
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'replace';
    }
}
