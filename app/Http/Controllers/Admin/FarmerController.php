<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class FarmerController extends ModuleController
{
    protected $moduleName = 'farmers';
    protected $permalinkBase = 'boeren';
    protected $titleColumnKey = 'name';
}
