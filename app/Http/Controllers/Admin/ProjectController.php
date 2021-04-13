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
        $projects = Project::orderBy('date', 'desc')->paginate(15);
        return view('site.projects-overview', [
            'projects' => $projects,
            'keyword' => "",
            'sort' => "date_descending",
        ]);
    }

    public function filter(Request $request) {
        $keyword = $request->keyword;
        $sort = $request->sort;

        $projects = null;
        switch($sort) {
            case 'date_descending':
                $projects = Project::orderBy('date', 'desc');
                break;
            case 'date_ascending':
                $projects = Project::orderBy('date', 'asc');
                break;
            default:
                $sort = ""; 
                $projects = Project::orderBy('date', 'desc');
        }
        
        $projects = $projects->where(function ($p) use ($keyword){

            if($keyword) {

                $p->where('name', 'like', "%".$keyword."%")
                    ->orWhere('name', 'like', "%".$keyword."%")
                    ->orWhere('description', 'like', "%".$keyword."%")
                    ->orWhere('address', 'like', "%".$keyword."%");
                
            }
        })->paginate(15);



        return view('site.projects-overview', [
            'projects' => $projects,
            'keyword' => $keyword,
            'sort' => $sort,
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
