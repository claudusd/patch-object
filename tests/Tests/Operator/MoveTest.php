<?php

namespace Claudusd\PatchObject\Tests\Operator;

use Claudusd\PatchObject\Operator\Move;

class MoveTest extends \PHPUnit_Framework_TestCase
{
    public function testReplace()
    {
        $target = new \stdClass();
        $target->origin = 'foo';
        $target->val = null;

        $replace = new Move('val', 'origin');
        $replace->execute($target);

        $this->assertEquals('foo', $target->val);
        $this->assertNull($target->origin);
    }
}
