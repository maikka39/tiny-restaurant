<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class NewsItemController extends ModuleController
{
    protected $permalinkBase = 'nieuws';
    protected $titleColumnKey = 'title';
    protected $moduleName = 'newsItems';
}
