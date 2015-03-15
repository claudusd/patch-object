<?php

namespace Claudusd\PatchObject;

use Claudusd\PatchObject\Operator\Add;

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
            } 
        }
        return $patch;
    }

    protected function readAdd(array $operationData)
    {
        return new Add($this->executor, $operationData['path'], $operationData['value']); 
    }
}
