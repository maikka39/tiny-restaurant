<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\DonationPage;
use App\Repositories\ProjectRepository;

class DonationPageController extends ModuleController
{
    protected $moduleName = 'donationPages';

    public function view()
    {
        $page = DonationPage::first();

        return view('site.donationPage', [
            'donationPage' => $page,
        ]);
    }

    public function admin()
    {
        $page = DonationPage::first();
        return view('admin.donationPages.form', $this->form($page->id));
    }
}
