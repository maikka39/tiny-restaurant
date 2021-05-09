<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Homepage;

class HomepageController extends ModuleController
{
    protected $moduleName = 'homepages';

    public function view()
    {
        $page = Homepage::first();
        // return view('admin.homepages.form', $this->form($page->id));

        return view('site.homepage', [
            'homepage' => $page
        ]);
    }

    public function admin()
    {
        $page = Homepage::first();
        return view('admin.homepages.form', $this->form($page->id));
    }
}
