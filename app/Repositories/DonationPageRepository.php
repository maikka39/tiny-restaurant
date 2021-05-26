<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRepeaters;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\DonationPage;

class DonationPageRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias, HandleRevisions, HandleRepeaters;

    public function __construct(DonationPage $model)
    {
        $this->model = $model;
    }

    public function getFormFields($object)
    {

        $fields = parent::getFormFields($object);

        return $fields;
    }

    public function afterSave($object, $fields)
    {
        parent::afterSave($object, $fields);
    }
}
