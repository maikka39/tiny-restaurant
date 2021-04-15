<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\NewsItem;

class NewsItemRepository extends ModuleRepository
{
    use HandleBlocks, HandleMedias, HandleRevisions, HandleFiles;

    public function __construct(NewsItem $model)
    {
        $this->model = $model;
    }
}
