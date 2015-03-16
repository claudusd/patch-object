<?php

namespace Claudusd\PatchObject\Tests;

use Claudusd\PatchObject\PropertyAccessor;

class PropertyAccessorTest extends \PHPUnit_Framework_TestCase 
{
    public function testGetFromObject()
    {
        $object = new PetitObject();

        $getter = new PropertyAccessor();

        $this->assertEquals('foo', $getter->get($object, 'val'));        
    }

    public function testGetFromArray()
    {
        $array = [];
        $array['val'] = 'foo';

        $getter = new PropertyAccessor();
 
        $this->assertEquals('foo', $getter->get($array, 'val'));
    }
}

class PetitObject
{
    private $val = 'foo';
}
