<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home;
use App\Models\Homepage;
use Illuminate\Routing\Controller;
use App\Repositories\HomeRepository;
use App\Http\Requests\HomeSettingsRequest;
use App\Models\HomeSetting;

class HomeController extends Controller
{
    public function __construct() 
    {
        $this->homeRepository = new HomeRepository();
    } 

    //Mainhomepage: id = 1;
    //Extra 'concept setting pages' could be made using other id's (no view for it))
    public function show() 
    {
        $homepage = Home::find(1);
        $bannerTitle = $homepage->settings->where('key', 'banner_title')->first()->value ?? "Het Tiny Restaurant";
        $bannerDescription = $homepage->settings->where('key', 'banner_description')->first()->value ?? "Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te gaan?";
       
        return view('admin.homesettings.form', [
            'bannerTitle' => $bannerTitle,
            'bannerDescription' => $bannerDescription,
            'links' => $homepage->links
        ]);
    }

    public function view()
    {
        $homepage = Home::find(1);
        $bannerTitle = $homepage->settings->where('key', 'banner_title')->first()->value ?? "Het Tiny Restaurant";
        $bannerDescription = $homepage->settings->where('key', 'banner_description')->first()->value ?? "Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te gaan?";
        $agendaItems = app(ProjectRepository::class)
            ->where('date', '>=', now())
            ->where('published', true)
            ->orderBy('date')
            ->get()
            ->take(3);

        return view('site.home', [
            'bannerTitle' => $bannerTitle,
            'bannerDescription' => $bannerDescription,
            'agendaItems' => $agendaItems,
            'links' => $homepage->links
        ]);
    }

    public function update(HomeSettingsRequest $request) 
    {
        $this->homeRepository->updateSetting('banner_title', $request['banner_title']);
        $this->homeRepository->updateSetting('banner_description', $request['banner_description']);
        $this->homeRepository->saveLinks($request['links']);
        
        return redirect()->route('admin.homesettings.show');
    }
}