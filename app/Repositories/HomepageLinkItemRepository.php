<?php

namespace App\Repositories;

use A17\Twill\Repositories\ModuleRepository;
use App\Models\HomepageLinkItem;

class HomepageLinkItemRepository extends ModuleRepository
{

    public function __construct(HomepageLinkItem $model)
    {
        $this->model = $model;
    }
}
