<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use A17\Twill\Http\Controllers\Admin\ModuleController;

class PageController extends ModuleController
{
    protected $moduleName = 'pages';
    protected $permalinkBase = '';
    protected $previewView = 'site.pages.show';

    public function view($slug)
    {
        $page = Page::forSlug($slug)->first() ?? abort(404);

        return view('site.pages.show', [
            'item' => $page
        ]);
    }
}
