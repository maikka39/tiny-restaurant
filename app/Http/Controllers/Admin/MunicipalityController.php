<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class MunicipalityController extends ModuleController
{
    protected $moduleName = 'municipalities';
    protected $permalinkBase = 'gemeente';
}
