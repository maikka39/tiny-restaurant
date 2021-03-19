<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Repositories\MunicipalityRepository;

use Illuminate\Http\Request;
use App\Models\Municipality;

class MunicipalityController extends ModuleController
{
    protected $moduleName = 'municipalities';
    protected $permalinkBase = 'gemeente';

    public function view ($slug) {
        $municipality = Municipality::forSlug($slug)->firstOrFail();
        return view('municipality', [
            'municipality' => $municipality
        ]);
    }
}
