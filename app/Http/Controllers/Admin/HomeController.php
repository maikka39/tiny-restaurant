<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home;
use Illuminate\Routing\Controller;
use App\Repositories\HomeRepository;
use App\Repositories\ProjectRepository;
use App\Http\Requests\HomeSettingsRequest;

class HomeController extends Controller
{
    /**
     * @var HomeRepository
     */
    private $homeRepository;

    public function __construct() 
    {
        $this->homeRepository = new HomeRepository();
    } 

    //Mainhomepage: id = 1;
    //Extra 'concept setting pages' could be made using other id's (no view for it))
    public function show() 
    {
        $settings = $this->getSettings();

        return view('admin.homesettings.form', [
            'bannerTitle' => $settings['bannerTitle'],
            'bannerDescription' => $settings['bannerDescription'],
            'links' => $settings['links'],
        ]);
    }

    public function view()
    {
        $settings = $this->getSettings();
        $agendaItems = app(ProjectRepository::class)
            ->where('date', '>=', now())
            ->where('published', true)
            ->orderBy('date')
            ->get()
            ->take(3);

        return view('site.home', [
            'bannerTitle' => $settings['bannerTitle'],
            'bannerDescription' => $settings['bannerDescription'],
            'agendaItems' => $agendaItems,
            'links' => $settings['links'],
        ]);
    }

    public function update(HomeSettingsRequest $request) 
    {
        $this->homeRepository->updateSetting('banner_title', $request['banner_title']);
        $this->homeRepository->updateSetting('banner_description', $request['banner_description']);
        $this->homeRepository->saveLinks($request['links']);
        
        return redirect()->route('admin.homesettings.show');
    }

    public function getSettings() {   
        $homepage = Home::find(1);
        $data['bannerTitle'] = $homepage->settings->where('key', 'banner_title')->first()->value ?? "Het Tiny Restaurant";
        $data['bannerDescription'] = $homepage->settings->where('key', 'banner_description')->first()->value ?? "Wilt u als bedrijf ook het verschil maken en waardevol ondernemen door naar uw doelgroep toe te gaan?";
        $data['links'] = $homepage->links;
        return $data;
    }
}