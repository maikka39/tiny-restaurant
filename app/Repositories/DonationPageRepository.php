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
    use HandleBlocks, HandleMedias, HandleRevisions, HandleRepeaters;

    public function __construct(DonationPage $model)
    {
        $this->model = $model;
    }

    public function getFormFields($object)
    {
        $fields = parent::getFormFields($object);

        $fields = $this->getFormFieldsForRepeater($object, $fields, 'donation_amounts', 'DonationPageAmount');

        return $fields;
    }

    public function afterSave($object, $fields)
    {
        $this->updateRepeater($object, $fields, 'donation_amounts', 'DonationPageAmount');

        parent::afterSave($object, $fields);
    }
}
