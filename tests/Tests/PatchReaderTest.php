<?php

namespace Claudusd\PatchObject\Tests;

use Claudusd\PatchObject\PatchReader;
use Mockery as M;

class PatchTest extends \PHPUnit_Framework_TestCase 
{
    public function testSomesThings()
    {
        $reader = new PatchReader(M::mock('Claudusd\PatchObject\Executor'));
        
        $patchToJson = array(
            array(
                'op' => 'add',
                'patch' => '/a/b/c',
                'value' => 'titi'
            )
        );

        $patch = $reader->read(json_encode($patchToJson));

        $this->assertCount(1, $patch);
    }

    
}
