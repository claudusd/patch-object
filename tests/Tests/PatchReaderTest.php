<?php

namespace Claudusd\PatchObject\Tests;

use Claudusd\PatchObject\PatchReader;
use Mockery as M;

class PatchReaderTest extends \PHPUnit_Framework_TestCase 
{
    public function testSomesThings()
    {
        $reader = new PatchReader(M::mock('Claudusd\PatchObject\Executor'));
        
        $patchJson = '[
{ "op": "test", "path": "/a/b/c", "value": "foo" },
{ "op": "remove", "path": "/a/b/c" },
{ "op": "add", "path": "/a/b/c", "value": [ "foo", "bar" ] },
{ "op": "replace", "path": "/a/b/c", "value": 42 },
{ "op": "move", "from": "/a/b/c", "path": "/a/b/d" },
{ "op": "copy", "from": "/a/b/d", "path": "/a/b/e" }
]'; 

        $patch = $reader->read($patchJson);
        
        $this->assertInstanceOf('Claudusd\PatchObject\Patch', $patch);
        $this->assertCount(6, $patch);
        
        $patch->seek(0);
        $this->assertInstanceOf('Claudusd\PatchObject\Operator\Test', $patch->current());
        $this->assertEquals('/a/b/c', $patch->current()->getPath());
        $this->assertEquals('foo', $patch->current()->getValue());

        $patch->seek(1);
        $this->assertInstanceOf('Claudusd\PatchObject\Operator\Remove', $patch->current());      
        $this->assertEquals('/a/b/c', $patch->current()->getPath());

        $patch->seek(2);
        $this->assertInstanceOf('Claudusd\PatchObject\Operator\Add', $patch->current());
        $this->assertEquals('/a/b/c', $patch->current()->getPath());
        $this->assertTrue(is_array($patch->current()->getValue()));

        $patch->seek(3);
        $this->assertInstanceOf('Claudusd\PatchObject\Operator\Replace', $patch->current());
        $this->assertEquals('/a/b/c', $patch->current()->getPath());
        $this->assertEquals(42, $patch->current()->getValue());

        $patch->seek(4);
        $this->assertInstanceOf('Claudusd\PatchObject\Operator\Move', $patch->current());
        $this->assertEquals('/a/b/d', $patch->current()->getPath());
        $this->assertEquals('/a/b/c', $patch->current()->getFrom());
        
        $patch->seek(5);
        $this->assertInstanceOf('Claudusd\PatchObject\Operator\Copy', $patch->current());
        $this->assertEquals('/a/b/e', $patch->current()->getPath());
        $this->assertEquals('/a/b/d', $patch->current()->getFrom());
    }

    
}
