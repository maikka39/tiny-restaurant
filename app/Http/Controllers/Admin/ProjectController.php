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

    public function showAll() {
        $projects = Project::orderBy('date')->paginate(15);
        return view('site.projects-overview', [
            'projects' => $projects
        ]);
    }

    public function filter(Request $request) {
        $keyword = $request->keyword;
        
        $projects = Project::orderBy('date')->where(function ($p) use ($keyword){

            if($keyword) {

                $p->where('name', 'like', "%".$keyword."%")
                    ->orWhere('name', 'like', "%".$keyword."%")
                    ->orWhere('description', 'like', "%".$keyword."%")
                    ->orWhere('address', 'like', "%".$keyword."%");
                
            }
        })->latest()->paginate(15);

        return view('site.projects-overview', [
            'projects' => $projects
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
