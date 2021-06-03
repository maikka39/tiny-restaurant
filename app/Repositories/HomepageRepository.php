<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRepeaters;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Homepage;

class HomepageRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias, HandleRevisions, HandleRepeaters;

    public function __construct(Homepage $model)
    {
        $this->model = $model;
    }

    public function getFormFields($object)
    {

        $fields = parent::getFormFields($object);

        $fields = $this->getFormFieldsForRepeater($object, $fields, 'homepage_link_items', 'HomepageLinkItem');
        $fields = $this->getFormFieldsForRepeater($object, $fields, 'partner_items', 'HomepagePartnerItem');

        return $fields;
    }

    public function afterSave($object, $fields)
    {
        $this->updateRepeater($object, $fields, 'homepage_link_items', 'HomepageLinkItem');
        $this->updateRepeater($object, $fields, 'partner_items', 'HomepagePartnerItem');

        parent::afterSave($object, $fields);
    }
}
