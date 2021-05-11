<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\HomepagePartnerItem;

class HomepagePartnerItemRepository extends ModuleRepository
{
    use HandleMedias;

    public function __construct(HomepagePartnerItem $model)
    {
        $this->model = $model;
    }
}
