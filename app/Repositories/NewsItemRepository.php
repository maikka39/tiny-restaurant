<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleBrowsers;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\NewsItem;

class NewsItemRepository extends ModuleRepository
{

    public function __construct(NewsItem $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields)
    {
        if(array_key_exists('browsers', $fields) && isset($fields['browsers']['links'])) {
            $position = 1;
            foreach ($fields['browsers']['links'] as $link) {
                if($link["endpointType"] == 'App\\Models\\Municipality') {
                    $object->municipalities()->attach($link["id"], ["position" => $position++]);
                }
                else if($link["endpointType"] == 'App\\Models\\Farmer') {
                    $object->farmers()->attach($link["id"], ["position" => $position++]);
                }
                else if($link["endpointType"] == 'App\\Models\\Page') {
                    $object->pages()->attach($link["id"], ["position" => $position++]);
                }
            }
        }
        parent::afterSave($object, $fields);
    }
}
