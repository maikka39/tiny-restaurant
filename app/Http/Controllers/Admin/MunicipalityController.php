<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\Builder;

class MunicipalityController extends ModuleController
{
    protected $moduleName = 'municipalities';
    protected $permalinkBase = 'gemeente';

    public function view($slug)
    {
        $municipality = Municipality::whereHas('slugs', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        $projects = $municipality
            ->projects()
            ->where('published', true)
            ->where('date', '>', now())
            ->orderBy('date')
            ->take(3)
            ->get();

        return view('site.municipality', [
            'municipality' => $municipality,
            'projects' => $projects,
        ]);
    }
}
