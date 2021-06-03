<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Farmer;
use App\Models\Municipality;
use App\Repositories\FarmerRepository;
use App\Repositories\MunicipalityRepository;
use Illuminate\Database\Eloquent\Builder;

class FarmerController extends ModuleController
{
    protected $moduleName = 'farmers';
    protected $permalinkBase = 'boer';
    protected $titleColumnKey = 'name';

    public function view($slug)
    {
        $farmer = Farmer::whereHas('slugs', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        return view('site.farmer', [
            'item' => $farmer
        ]);
    }

    public function formData($request)
    {
        return [
            'municipalities' => app()->make(MunicipalityRepository::class)->listAll(),
        ];
    }
}
