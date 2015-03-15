<?php

namespace Claudusd\PatchObject;

use Claudusd\PatchObject\Operator\Operator;

class Patch implements \Iterator, \Countable
{
    protected $position = 0;

    protected $operations;

    public function __construct()
    {
        $this->operations = [];
    }

    public function addOperation(Operator $operator)
    {
        $this->operations[] = $operator;
        return $this;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->operations[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->operations[$this->position]);
    }
    
    public function count()
    {
        return count($this->operations);
    }
}
