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
        
    }
    
    /**
     * @{inheritdoc}
     */
    public function getName()
    {
        return 'remove';
    }
}
