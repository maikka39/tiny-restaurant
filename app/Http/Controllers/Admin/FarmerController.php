<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Farmer;
use App\Models\Municipality;
use App\Repositories\FarmerRepository;

class FarmerController extends ModuleController
{
    protected $moduleName = 'farmers';
    protected $permalinkBase = 'boeren';
    protected $titleColumnKey = 'name';

    public function view($slug)
    {
        $page = Farmer::with('municipality')->forSlug($slug)->first() ?? abort(404);

        return view('site.farmer', [
            'item' => $page
        ]);
    }

    public function formData($request)
    {
        return [
            'municipalities' => Municipality::all()->pluck('name','id'),
        ];
    }
}
