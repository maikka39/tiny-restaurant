<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\Controller;

class DonateController extends Controller
{
    public function view()
    {
        return view('site.donate', []);
    }
}
