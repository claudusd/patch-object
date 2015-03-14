<?php

namespace Claudusd\PatchObject\Operator;

use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 *
 */
class Remove extends Operator
{
    public function execute($target)
    {
        $accessor = PropertyAccess::createPropertyAccessor();
        $accessor->setValue($target, $this->path, null);
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'remove';
    }
}
