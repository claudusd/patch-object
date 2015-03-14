<?php

namespace Claudusd\PatchObject\Tests\Operator;

use Claudusd\PatchObject\Operator\Remove;

class RemoveTest extends \PHPUnit_Framework_TestCase
{
    public function testReplace()
    {
        $target = new \stdClass();
        $target->val = 'foo';

        $replace = new Remove('val');
        $replace->execute($target);

        $this->assertNull($target->val);
    }
}
