<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\TestModule;

class TestModuleRepository extends ModuleRepository
{
    use HandleBlocks;

    public function __construct(TestModule $model)
    {
        $this->model = $model;
    }
}
