<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleBrowsers;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Project;
use phpDocumentor\Reflection\Types\Parent_;
use Symfony\Polyfill\Intl\Idn\Info;

class ProjectRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias, HandleRevisions, HandleBrowsers;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function aftersave($object, $fields) {
        
        $this->updateBrowser($object, $fields, 'municipalities');
        $this->updateBrowser($object, $fields, 'farmers');
        parent::afterSave($object, $fields);
    }

    public function getFormFields($object)
    {
        $fields = parent::getFormFields($object);
        $fields['browsers']['municipalities'] = $this->getFormFieldsForBrowser($object, 'municipalities', null, 'title', 'municipalities');
        $fields['browsers']['farmers'] = $this->getFormFieldsForBrowser($object, 'farmers', null, 'name', 'farmers');
        //dd($fields);

        return $fields;
    }


}
