<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Repositories\FarmerRepository;
use App\Models\Project;
use App\Repositories\MunicipalityRepository;
use Illuminate\Http\Request;

class ProjectController extends ModuleController
{
    protected $moduleName = 'projects';
    protected $permalinkBase = 'project';
    protected $titleColumnKey = 'name';

    public function showAll()
    {
        $publishedProjects = Project::query()
            ->where('published', true)
            ->get()
            ->sortByDesc(function ($project) {
                return $project->created_at;
            });

        if(request()->has('search') && request()->query('search') != null) {
            $publishedProjects = $publishedProjects->filter(function ($project, $key) {
                return $project->filter(request()->query('search'));
            })->all();
        }

        return view('site.projects-overview', [
            'projects' => $publishedProjects,
        ]);
    }


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
