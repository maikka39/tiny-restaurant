<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleBrowsers;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\NewsItem;

class NewsItemRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias, HandleRevisions, HandleBrowsers;

    private $supportedLinks = ['municipalities', 'pages', 'farmers'];

    public function __construct(NewsItem $model)
    {
        $this->model = $model;
    }

    public function getFormFields($object): array
    {
        $fields = parent::getFormFields($object);

        foreach ($this->supportedLinks as $link) {
            $fields['browsers'][$link] = $this->getFormFieldsForBrowser($object, $link);
        }

        return $fields;
    }
}
