<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\NewsItem;
use App\Notifications\NewsItemPosted;

class NewsItemRepository extends ModuleRepository
{
    use HandleBlocks;
    use HandleMedias;
    use HandleRevisions;
    use HandleFiles;

    public function __construct(NewsItem $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields)
    {
        parent::afterSave($object, $fields);
        $newsItem = NewsItem::find($object->id);
        if($fields['post_to_facebook']) {
            $newsItem->notify(new NewsItemPosted($newsItem));
        }
        info($fields['post_to_facebook']);
    }
}
