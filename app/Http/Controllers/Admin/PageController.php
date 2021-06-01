<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use A17\Twill\Http\Controllers\Admin\ModuleController;
use Illuminate\Database\Eloquent\Builder;

class PageController extends ModuleController
{
    protected $moduleName = 'pages';
    protected $permalinkBase = '';
    protected $previewView = 'site.pages.show';

    public function view($slug)
    {
        $page = Page::whereHas('slugs', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        return view('site.pages.show', [
            'item' => $page
        ]);
    }
}
