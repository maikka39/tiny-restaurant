<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Page;

class PageController extends ModuleController
{
    protected $moduleName = 'pages';
    protected $permalinkBase = '';
    protected $previewView = 'site.pages.show';

    public function view($slug)
    {
        $page = Page::forSlug($slug)->first() ?? abort(404);

        return view('site.pages.show', [
            'item' => $page,
        ]);
    }
}
