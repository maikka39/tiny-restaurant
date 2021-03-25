<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Repositories\FarmerRepository;
use App\Models\Project;
use App\Repositories\MunicipalityRepository;

class ProjectController extends ModuleController
{
    protected $moduleName = 'projects';
    protected $permalinkBase = 'project';
    protected $titleColumnKey = 'name';

    public function view($slug) {
        $project = Project::forSlug($slug)->firstOrFail();
        return view('site.project', [
            'item' => $project
        ]);

    }

    public function formData($request)
    {
        return [
            'municipalities' => app()->make(MunicipalityRepository::class)->listAll(),
            'farmers' => app()->make(FarmerRepository::class)->listAll(),
        ];
    }
    
}
