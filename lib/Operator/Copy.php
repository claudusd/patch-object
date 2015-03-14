<?php

namespace Claudusd\PatchObject\Operator;

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
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'copy';
    }
}
