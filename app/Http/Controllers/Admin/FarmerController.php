<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Farmer;

class FarmerController extends ModuleController
{
    protected $moduleName = 'farmers';
    protected $permalinkBase = 'boeren';
    protected $titleColumnKey = 'name';

    public function view($slug)
    {
        $page = Farmer::forSlug($slug)->first() ?? abort(404);

        return view('site.farmer', [
            'item' => $page
        ]);
    }
}
