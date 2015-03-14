<?php

namespace Claudusd\PatchObject\Tests\Operator;

use Claudusd\PatchObject\Operator\Copy;

class CopyTest extends \PHPUnit_Framework_TestCase
{
    public function testReplace()
    {
        $target = new \stdClass();
        $target->origin = 'foo';
        $target->val = null;

        $replace = new copy('val', 'origin');
        $replace->execute($target);

        $this->assertEquals('foo', $target->val);
    }
}
