<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\HomeRepository;
use Illuminate\Routing\Controller;
use App\Models\Homepage;
use App\Http\Requests\HomeSettingsRequest;

class HomeController extends Controller
{
    //Mainhomepage: id = 1;
    //Extra 'concept setting pages' could be made using other id's
    public function show() 
    {
        return view('admin.homesettings.form');
    }

    public function view()
    {
        $homepage = Homepage::find(1);
        $bannerTitle = $homepage->settings->where('key', 'banner_title')->first()->value ?? "Het Tiny Restaurant";
        $bannerDescription = $homepage->settings->where('key', 'banner_description')->first()->value ?? "Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te gaan?";
    
        return view('site.home', [
            'bannerTitle' => $bannerTitle,
            'bannerDescription' => $bannerDescription
        ]);
    }

    public function update(HomeSettingsRequest $request) 
    {
        dd($request);
        return redirect()->route('homesettings.show');
    }
}