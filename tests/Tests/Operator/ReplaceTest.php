<?php

namespace Claudusd\PatchObject\Tests\Operator;

use Claudusd\PatchObject\Operator\Replace;

class ReplaceTest extends \PHPUnit_Framework_TestCase
{
    public function testReplace()
    {
        $target = new \stdClass();
        $target->val = 'foo';

        $replace = new Replace('val', 'bar');
        $replace->execute($target);

        $this->assertEquals('bar', $target->val);
    }
}
