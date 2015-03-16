<?php

namespace Claudusd\PatchObject;

use Claudusd\PatchObject\Operator\Add;
use Claudusd\PatchObject\Operator\Copy;
use Claudusd\PatchObject\Operator\Move;
use Claudusd\PatchObject\Operator\Remove;
use Claudusd\PatchObject\Operator\Replace;
use Claudusd\PatchObject\Operator\Test;

class PatchReader
{
    protected $executor;

    public function __construct(Executor $executor)
    {
        $this->executor = $executor;
    }

    public function read($patchData)
    {
        $patch = new Patch();
        $patchData = json_decode($patchData, true);
        foreach ($patchData as $operationData) {
            if ($operationData['op'] === 'add') {
                $patch->addOperation($this->readAdd($operationData));
            } elseif ($operationData['op'] === 'remove') {
                $patch->addOperation($this->readRemove($operationData));
            } elseif ($operationData['op'] === 'move') {
                $patch->addOperation($this->readMove($operationData));
            } elseif ($operationData['op'] === 'copy') {
                $patch->addOperation($this->readCopy($operationData));
            } elseif ($operationData['op'] === 'replace') {
                $patch->addOperation($this->readReplace($operationData));
            } elseif ($operationData['op'] === 'test') {
                $patch->addOperation($this->readTest($operationData));
            }
        }
        return $patch;
    }

    protected function readAdd(array $operationData)
    {
        return new Add($this->executor, $operationData['path'], $operationData['value']); 
    }

    protected function readRemove(array $operationData)
    {
        return new Remove($this->executor, $operationData['path']);
    }

    protected function readMove(array $operationData)
    {   
        return new Move($this->executor, $operationData['path'], $operationData['from']);
    }

    protected function readCopy(array $operationData)
    {
        return new Copy($this->executor, $operationData['path'], $operationData['from']);
    }

    protected function readReplace(array $operationData)
    {
        return new Replace($this->executor, $operationData['path'], $operationData['value']);
    }

    protected function readTest(array $operationData)
    {
        return new Test($this->executor, $operationData['path'], $operationData['value']);
    }
}
