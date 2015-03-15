<?php

namespace Claudusd\PatchObject\Tests;

use Claudusd\PatchObject\Executor;

class ExecutorTest extends \PHPUnit_Framework_TestCase 
{
    public function testFirstLevel()
    {
        $executor = new Executor();

        $object = new FirstLevel();

        $return = $executor->get('/', $object);
        
        $this->assertInstanceOf('Claudusd\PatchObject\Tests\FirstLevel', $return);
    }

    public function testSecondLevel()
    {
        $executor = new Executor();
         
        $object = new FirstLevel();
        
        $return = $executor->get('/val', $object);
 
        $this->assertInstanceOf('Claudusd\PatchObject\Tests\SecondLevel', $return);
    }

    public function testThirdLevel()
    {
        $executor = new Executor();
        
        $object = new FirstLevel();

        $return = $executor->get('/val/val', $object);

        $this->assertTrue(is_array($return));
    }

    public function testFourthLevel()
    {
        $executor = new Executor();
        
        $object = new FirstLevel();

        $return = $executor->get('/val/val/1', $object);

        $this->assertTrue(is_string($return));
        $this->assertEquals('deux', $return);
    }
}

class FirstLevel
{
    private $val;

    public function __construct()
    {
        $this->val = new SecondLevel();
    }
}

class SecondLevel
{
    private $val;

    public function __construct()
    {
        $this->val = ['un', 'deux', 'trois'];
    }
}
